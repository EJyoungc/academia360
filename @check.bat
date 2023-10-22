    @echo off

    :: Replace 'YOUR_BOT_TOKEN' with your actual bot token.
    set BOT_TOKEN=YOUR_BOT_TOKEN

    :: URL of your bot's webhook endpoint.
    set WEBHOOK_URL=https://your-webhook-url.com

    :: Create a sample message you want to send to the bot.
    set MESSAGE=Hello, Bot!

    :: Build the cURL command to send the message.
    curl -X POST "https://micromek.net/academia/bot/telegram" ^
    -d "chat_id=YOUR_CHAT_ID" ^
    -d "text=%MESSAGE%"

    :: Pause to view the response (you can remove this line if you don't want to see the response).
    pause

    Replace the placeholders:
        'YOUR_BOT_TOKEN' with your actual Telegram bot token.
        'YOUR_CHAT_ID' with the chat ID where you want to send the message.
        'Hello, Bot!' with the message you want to send.

    Run the Script:
        Open the Command Prompt.
        Navigate to the directory where you saved the script using the cd command.
        Run the script by entering its name (e.g., send_message.cmd) and pressing Enter.

The script will send a message to your Telegram bot's webhook URL using the cURL command, and it will display the response from the bot in the Command Prompt. You can inspect the response to see if your bot received and responded to the message correctly.
