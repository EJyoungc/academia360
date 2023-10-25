@echo off

:: Replace 'YOUR_BOT_TOKEN' and 'YOUR_WEBHOOK_URL' with your actual bot token and webhook URL.
set BOT_TOKEN=5926949306:AAEBNG97LFKwWfsKlOJIiJN0GS6cvZvKCJs
@REM set WEBHOOK_URL=https://micromek.net/academia/bot/telegram

:: API endpoint for setting the webhook
set API_ENDPOINT=https://api.telegram.org/bot%BOT_TOKEN%/setWebhook

:: Data to send in the POST request
set DATA=url=%WEBHOOK_URL%

:: Send the POST request using cURL
curl -d "%DATA%" -X POST %API_ENDPOINT%