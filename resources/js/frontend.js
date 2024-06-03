function scrollToRecent() {
    let chatContent = $('.fp__chat_body');
    chatContent.scrollTop(chatContent.prop("scrollHeight"));
}

window.Echo.private('livechat.' + loggedInUser)
    .listen('LivechatEvent', (e) => {
        let html = `<div class="fp__chating">
                        <div class="fp__chating_img">
                            <img src="${e.profilePict}" alt="person" class="img-fluid w-100 rounded-circle">
                        </div>
                        <div class="fp__chating_text">
                            <p>${e.message}</p>
                        </div>
                    </div>`;
        $('.fp__chat_body').append(html);

        scrollToRecent();
        $('.unseen-message-count').text(1);
    });
