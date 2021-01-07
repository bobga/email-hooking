<?php
    require_once 'vendor/autoload.php';

    use Ddeboer\Imap\Server;

    $server = new Server('imap-mail.outlook.com');
    
    // $connection is instance of \Ddeboer\Imap\Connection
    $connection = $server->authenticate('your@outlook.com', 'password');

    $mailbox = $connection->getMailbox('Inbox');

    $today = new DateTimeImmutable();

    //  $firstDayAgo is to fetch your emails by current day. 
    $firstDayAgo = $today->sub(new DateInterval('P00D'));

    $messages = $mailbox->getMessages(
        new Ddeboer\Imap\Search\Date\Since($firstDayAgo),
        \SORTDATE, // Sort criteria
        true // Descending order
    );
    
    
    foreach($messages as $message){        

        // $message->isSeen() is checking email was read or not
        if($message->isSeen()){
            continue;
        }else{
            
            printf("%s\n","------------------------ +++++ -------------------------------");
            printf("Subject: %s\n",$message->getSubject());
            printf("Body:\n");
            printf("%s\n",$message->getBodyText());
            
            
            $attachments = $message->getAttachments();

            foreach ($attachments as $attachment) {
                if ($attachment->isEmbeddedMessage()) {
                    $embeddedMessage = $attachment->getEmbeddedMessage();
                    // $embeddedMessage is instance of \Ddeboer\Imap\Message\EmbeddedMessage
                    printf("\t");
                    printf("%s\n", "************************************");
                    printf("\t");
                    printf("%s\n", "embeddedMessage:");
                    printf("\t");
                    printf("subject:%s\n", $embeddedMessage->getSubject());
                    printf("\t");
                    printf("body:%s\n", $embeddedMessage->getBodyText());
                    printf("\t");
                    printf("%s\n", "************************************");

                }else{

                    $result = file_put_contents(
                        'D:/' . $attachment->getFilename(),
                        $attachment->getDecodedContent()
                    );
                    if($result){
                        printf("\n");
                        printf("Download attachments succeed! File location: %s\n ", "D:/" . $attachment->getFilename());
                    }
                }                
            }

            // after read a new unread email, setting  mark on the email was seen
            $message->markAsSeen();

            printf("%s\n","------------------------- ***** ------------------------------");
            printf("\n");
        }
                    
    }
?>


