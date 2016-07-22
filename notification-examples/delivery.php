<?php

return '{
  "notificationType": "Delivery",
  "mail": {
    "timestamp": "2016-01-27T14:59:38.237Z",
    "messageId": "0000014644fe5ef6-9a483358-9170-4cb4-a269-f5dcdf415321-000000",
    "source": "john@example.com",
    "sourceArn": "arn:aws:ses:us-west-2:888888888888:identity/example.com",
    "sendingAccountId": "123456789012",
    "destination": [
      "jane@example.com"
    ],
    "headersTruncated": false,
    "headers": [
      {
        "name": "From",
        "value": "\"John Doe\" <john@example.com>"
      },
      {
        "name": "To",
        "value": "\"Jane Doe\" <jane@example.com>"
      },
      {
        "name": "Message-ID",
        "value": "custom-message-ID"
      },
      {
        "name": "Subject",
        "value": "Hello"
      },
      {
        "name": "Content-Type",
        "value": "text/plain; charset=\"UTF-8\""
      },
      {
        "name": "Content-Transfer-Encoding",
        "value": "base64"
      },
      {
        "name": "Date",
        "value": "Wed, 27 Jan 2016 14:58:45 +0000"
      }
    ],
    "commonHeaders": {
      "from": [
        "John Doe <john@example.com>"
      ],
      "date": "Wed, 27 Jan 2016 14:58:45 +0000",
      "to": [
        "Jane Doe <jane@example.com>"
      ],
      "messageId": "custom-message-ID",
      "subject": "Hello"
    }
  },
  "delivery": {
    "timestamp": "2016-01-27T14:59:38.237Z",
    "recipients": [
      "jane@example.com"
    ],
    "processingTimeMillis": 546,
    "reportingMTA": "a8-70.smtp-out.amazonses.com",
    "smtpResponse": "250 ok:  Message 64111812 accepted"
  }
}';