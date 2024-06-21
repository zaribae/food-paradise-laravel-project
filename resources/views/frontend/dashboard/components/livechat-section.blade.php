<div class="tab-pane fade" id="v-pills-livechat" role="tabpanel" aria-labelledby="v-pills-livechat-tab">
    <div class="fp_dashboard_body fp__change_password">
        <div class="fp__message">
            <h3>Message</h3>
            <div class="fp__chat_area">
                <div class="fp__chat_body">
                    {{-- <div class="fp__chating">
                        <div class="fp__chating_img">
                            <img src="images/service_provider.png" alt="person" class="img-fluid w-100">
                        </div>
                        <div class="fp__chating_text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Pariatur qui amet aperiam, magni accusamus voluptatum
                                neque
                                aut tenetur odit officia fugit et sint harum inventore
                                recusandae id quibusdam ducimus consequuntur.</p>
                            <span>15 Jun, 2023, 05:26 AM</span>
                        </div>
                    </div> --}}
                    {{-- <div class="fp__chating tf_chat_right">
                        <div class="fp__chating_img">
                            <img src="images/client_img_1.jpg" alt="person" class="img-fluid w-100">
                        </div>
                        <div class="fp__chating_text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            </p>
                            <span>15 Jun, 2023, 05:26 AM</span>
                        </div>
                    </div> --}}
                </div>
                <form class="fp__single_chat_bottom chat-input" method="post">
                    @csrf
                    <input type="hidden" name="message_temp_id" class="message-temp-id" value="">
                    <input type="text" class="fp-send-message" placeholder="Type a message..." name="message">
                    <input type="hidden" name="receiver_id" value="1">

                    <button class="fp__massage_btn" type="submit"><i class="fas fa-paper-plane"
                            aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            var userId = "{{ auth()->user()->id }}";

            function scrollToRecent() {
                let chatContent = $('.fp__chat_body');
                chatContent.scrollTop(chatContent.prop("scrollHeight"));
            }

            // Get Messages
            $('.fp-livechat').on('click', function(e) {
                let senderId = 1;

                $.ajax({
                    method: 'GET',
                    url: "{{ route('livechat.get-messages', ':senderId') }}".replace(
                        ':senderId',
                        senderId),
                    beforeSend: function() {

                    },
                    success: function(response) {
                        $('.fp__chat_body').empty();

                        $.each(response, function(index, message) {
                            let html = `<div class="fp__chating ${message.sender_id == userId ? "tf_chat_right" : ""}">
                        <div class="fp__chating_img">
                            <img src="${message.sender.image}" alt="person" class="img-fluid w-100 rounded-circle">
                        </div>
                        <div class="fp__chating_text">
                            <p>${message.message}</p>
                        </div>
                    </div>`;

                            $('.fp__chat_body').append(html);
                            $('.unseen-message-count').text(0);
                        });
                        scrollToRecent();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {

                    }
                })
            })

            // Send Message
            $('.chat-input').on('submit', function(e) {
                e.preventDefault();
                let messageId = Math.floor(Math.random() * 10000);
                $('.message-temp-id').val(messageId);

                let formData = $(this).serialize();

                $.ajax({
                    method: 'POST',
                    url: "{{ route('livechat.send-message') }}",
                    data: formData,
                    beforeSend: function() {
                        let message = $('.fp-send-message').val();
                        let html = `<div class="fp__chating tf_chat_right">
                                        <div class="fp__chating_img">
                                            <img src="{{ asset(auth()->user()->image) }}" alt="person" class="img-fluid w-100 rounded-circle">
                                        </div>
                                        <div class="fp__chating_text">
                                            <p>${message}</p>
                                            <span class="fp-chat-send-status ${messageId}">Sending...</span>
                                        </div>
                                    </div>`;

                        $('.fp__chat_body').append(html);
                        $('.fp-send-message').val("");
                        scrollToRecent();
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
            });
        })
    </script>
@endpush
