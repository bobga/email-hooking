# Email Hooking

A PHP-based email monitoring system that connects to IMAP email servers (specifically configured for Outlook) to automatically process new emails, extract their contents, and handle attachments.

## Features

- Connects to IMAP email servers (Outlook by default)
- Retrieves unread emails from the current day
- Extracts email subject and body content
- Handles both regular and embedded message attachments
- Automatically downloads attachments to a specified directory
- Marks processed emails as 'seen' to prevent duplicate processing
- Supports sorting emails by date in descending order

## Requirements

- PHP 7.0 or higher
- Composer for dependency management
- IMAP PHP extension enabled
- Write permissions for the attachment download directory

## Installation

1. Clone this repository:
   ```bash
   git clone https://github.com/bobga/email-hooking.git
   cd email-hooking
   ```

2. Install dependencies using Composer:
   ```bash
   composer install
   ```

3. Configure your email credentials:
   - Open `index.php`
   - Replace `'your@outlook.com'` with your email address
   - Replace `'password'` with your email password
   - Adjust the IMAP server settings if using a different email provider

## Usage

1. Run the script:
   ```bash
   php index.php
   ```

2. The script will:
   - Connect to your email server
   - Fetch unread emails from the current day
   - Display email subjects and body content
   - Process any attachments:
     - Regular attachments are downloaded to the specified directory
     - Embedded messages are displayed with their subject and content
   - Mark processed emails as 'seen'

## Configuration

You can customize the following settings in `index.php`:

- IMAP Server: `imap-mail.outlook.com` (default for Outlook)
- Mailbox: `Inbox` (default mailbox)
- Attachment Directory: `D:/` (default download location)
- Date Range: Currently set to fetch today's emails
- Sort Order: Emails are sorted by date in descending order

## Security Notes

- Never commit your email credentials to version control
- Consider using environment variables for sensitive information
- Ensure proper file permissions for the attachment download directory
- Use secure connection settings when available

## Dependencies

- [ddeboer/imap](https://github.com/ddeboer/imap) (^1.9) - PHP IMAP library

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
