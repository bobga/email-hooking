# Email Reader

This PHP script allows you to connect to an IMAP email server (specifically Outlook in this example) and retrieve emails from the inbox. It utilizes the `Ddeboer\Imap` library for interacting with the IMAP server.

## Requirements

- PHP version 5.3 or higher
- Composer for installing dependencies

## Installation

1. Clone this repository to your local machine.
2. Run `composer install` to install the required dependencies.
3. Replace `'your@outlook.com'` and `'password'` with your Outlook email address and password.
4. Adjust any other settings or criteria according to your needs.

## Usage

1. Run the script (`email_reader.php`) from the command line or execute it via a web server with PHP support.
2. The script will connect to the Outlook IMAP server and authenticate with the provided credentials.
3. It retrieves emails from the inbox that were received on the current day.
4. For each email, it prints the subject and body text to the console.
5. If there are any attachments, it downloads them to the specified directory (`D:/` in this example).
6. Finally, it marks each processed email as 'seen' to prevent re-processing.

## Configuration

- Adjust the IMAP server settings (`imap-mail.outlook.com`) if you're using a different email provider.
- Modify the mailbox name (`Inbox`) if you want to read emails from a different folder.
- Customize the download directory (`D:/`) for saving attachments as needed.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
