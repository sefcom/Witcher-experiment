

# start up server 
make sure mysql is running 
flaskbb run --debugger --reload --host=0.0.0.0

curl 'http://172.17.0.14:5000/auth/login' \
  -H 'Connection: keep-alive' \
  -H 'Cache-Control: max-age=0' \
  -H 'Upgrade-Insecure-Requests: 1' \
  -H 'Origin: http://172.17.0.14:5000' \
  -H 'Content-Type: application/x-www-form-urlencoded' \
  -H 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36' \
  -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9' \
  -H 'Referer: http://172.17.0.14:5000/auth/login' \
  -H 'Accept-Language: en-US,en;q=0.9' \
  -H 'Cookie: session=eyJfZnJlc2giOmZhbHNlLCJjc3JmX3Rva2VuIjoiMWQ1YzVlYmVmYTVhMjgxZjQzMTBhNTI0Y2E0YzkyNjhkMTZlOGEzOCJ9.YIgrYA.wobfwyP79-pRKtMBTOEDqQaGpIw' \
  --data-raw 'recaptcha=&login=admin&password=admin&submit=Login' \
  --compressed \
  --insecure