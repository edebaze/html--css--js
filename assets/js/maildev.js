$(function() {

    // GESTION DE MAILDEV

    const MailDev = require('maildev')

    const maildev = new MailDev()

    maildev.listen()

    // Handle new emails as they come in
    maildev.on('new', (email) => {
        console.log('Received new email with subject: ' + ${email.subject})
})

    // Get all emails
    maildev.getAllEmail((err, emails) => {
        if (err) {
            return console.log(err);
        } else {
            console.log('There are ' + ${emails.length} + ' emails')
        }

})

    const transport = nodemailer.createTransport({
        port: 1025,
        ignoreTLS: true,
        // other settings...
    });

})