const messageColor = document.querySelector('.message-color');
const sendMessageForm = document.querySelector('.send-message');

messageColor.addEventListener('input', () => {
    sendMessageForm.style.borderColor = messageColor.value
});