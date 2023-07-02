import requests

url = "https://cricbuzz-cricket.p.rapidapi.com/mcenter/v1/40381/hscard"

headers = {
	"X-RapidAPI-Key": "32ad0e3a99msh00cc6948049d195p1998f1jsnca8c3c518f49",
	"X-RapidAPI-Host": "cricbuzz-cricket.p.rapidapi.com"
}

response = requests.request("GET", url, headers=headers)

print(response.text)
