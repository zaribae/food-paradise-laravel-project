function scrollToRecent() {
    let chatContent = $('.chat-content');
    chatContent.scrollTop(chatContent.prop("scrollHeight"));
}

window.Echo.private('livechat.' + loggedInUser)
    .listen('LivechatEvent', (e) => {
        console.log(e);
        if (e.senderId == $('#mychatbox').attr('data-index')) {
            let html = `<div class="chat-item rounded-circle chat-left" style=""><img src="${e.profilePict}">
                                        <div class="chat-details">
                                            <div class="chat-text">${e.message}</div>
                                            <div class="chat-time"></div>
                                        </div>
                                    </div>`;

            $('.chat-content').append(html);
            scrollToRecent();
        }

        // Show New Message Notification
        $('.fp-chat-user').each(function () {
            let senderId = $(this).data('user');

            if (e.senderId == senderId) {
                let html = `<i class="beep"></i>New Message`;

                $(this).find('.new-message-notif').html(html);
            }
        });

        $('.message-notification').addClass('beep');
    });
