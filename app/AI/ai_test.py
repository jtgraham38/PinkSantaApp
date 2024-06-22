import requests
import json

# Payload + URL
url = "http://192.168.50.150:25568/api/generate" # Public
#url = "http://192.168.50.149:25568/api/generate" # Local
#question = input("Question: ")
question = "What is your purpose"
payload = {
    "model": "mistral",
    "prompt": question,
    "stream": False,
}

# Get Response
response = requests.post(url, data=json.dumps(payload))
response_json = response.json()

# Extract and print the "response" section
response_text = response_json.get("response")
print(response_text)