@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Chat Box</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Chat Box</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card" style="height: 80vh">
                        <div class="card-header">
                            <h4>Who's Online?</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                @foreach ($chats as $sender)
                                    @php
                                        $user = \App\Models\User::find($sender->sender_id);
                                        $unseenMessage = \App\Models\Livechat::where([
                                            'sender_id' => $user->id,
                                            'receiver_id' => auth()->user()->id,
                                            'seen' => 0,
                                        ])->count();
                                    @endphp
                                    <li class="media fp-chat-user" data-name="{{ $user->name }}"
                                        data-user="{{ $user->id }}" style="cursor: pointer">
                                        <img alt="image" class="mr-3 rounded-circle" width="50"
                                            src="{{ asset($user->image) }}">
                                        <div class="media-body">
                                            <div class="mt-0 mb-1 font-weight-bold">{{ $user->name }}</div>
                                            <div class="text-warning text-small font-600-bold new-message-notif">
                                                @if ($unseenMessage > 0)
                                                    <i class="beep"></i>New Message
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-9">
                    <div class="card chat-box" id="mychatbox" data-index="" style="height: 80vh">
                        <div class="card-header">
                            <h4 id="chat-header"></h4>
                        </div>
                        <div class="card-body chat-content" tabindex="2" style="overflow: hidden; outline: none;">
                            {{-- <div class="chat-item chat-left" style=""><img src="../dist/img/avatar/avatar-1.png">
                                <div class="chat-details">
                                    <div class="chat-text">Hi, dude!</div>
                                    <div class="chat-time">07:31</div>
                                </div>
                            </div>
                            <div class="chat-item chat-right" style=""><img src="../dist/img/avatar/avatar-2.png">
                                <div class="chat-details">
                                    <div class="chat-text">Wat?</div>
                                    <div class="chat-time">07:31</div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="card-footer chat-form">
                            <form id="chat-form">
                                @csrf
                                <input type="text" class="form-control fp-send-message" placeholder="Type a message"
                                    name="message">
                                <input type="hidden" name="receiver_id" id="receiver-id" value="">
                                <input type="hidden" name="message_temp_id" class="message-temp-id" value="">
                                <button class="btn btn-primary">
                                    <i class="far fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var userId = "{{ auth()->user()->id }}";

            $('#receiver-id').val("");

            function scrollToRecent() {
                let chatContent = $('.chat-content');
                chatContent.scrollTop(chatContent.prop("scrollHeight"));
            }

            // Get User Chat
            $('.fp-chat-user').on('click', function() {
                let senderId = $(this).data('user');
                let senderName = $(this).data('name')
                let clickedUser = $(this);

                $('#mychatbox').attr('data-index', senderId);
                $('#receiver-id').val(senderId);

                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.livechat.get-messages', ':senderId') }}".replace(
                        ':senderId',
                        senderId),
                    beforeSend: function() {
                        $('.chat-content').empty();
                        $('#chat-header').text("Chat with " + senderName);
                    },
                    success: function(response) {
                        $('.chat-content').empty();

                        $.each(response, function(index, message) {
                            let html = `<div class="chat-item rounded-circle ${message.sender_id == userId ? "chat-right" : "chat-left"}" style=""><img src="${message.sender.image}">
                                    <div class="chat-details">
                                        <div class="chat-text">${message.message}</div>
                                    </div>
                                </div>`;

                            $('.chat-content').append(html);
                        });
                        scrollToRecent();

                        clickedUser.find('.new-message-notif').html("");
                        $('.message-notification').removeClass('beep');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {

                    }
                })
            })

            // Send User Messages
            $('#chat-form').on('submit', function(e) {
                e.preventDefault();
                let messageId = Math.floor(Math.random() * 10000);
                $('.message-temp-id').val(messageId);

                let formData = $(this).serialize();

                $.ajax({
                    method: 'POST',
                    url: "{{ route('admin.livechat.send-messages') }}",
                    data: formData,
                    beforeSend: function() {
                        let message = $('.fp-send-message').val();
                        let html = `<div class="chat-item chat-right" style=""><img src="{{ asset(auth()->user()->image) }}">
                                    <div class="chat-details">
                                        <div class="chat-text">${message}</div>
                                        <div class="chat-time ${messageId}">Sending...</div>
                                    </div>
                                </div>`;

                        $('.chat-content').append(html);
                        $('.fp-send-message').val("");
                        scrollToRecent();

                        // Remove Notification
                        $('.fp-chat-user').each(function() {
                            let senderId = $(this).data('user');

                            if ($('#mychatbox').attr('data-index') == senderId) {

                                $(this).find('.new-message-notif').html("");
                                $('.message-notification').removeClass('beep');
                            }
                        })
                    },
                    success: function(response) {
                        if ($('.message-temp-id').val() == response.message_id) {
                            console.log('.' + messageId);
                            $('.' + messageId).remove();
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        let errorMessage = jqXHR.responseJSON.message;
                        toastr.error(errorMessage);
                    }
                })
            })
        })
    </script>
@endpush
