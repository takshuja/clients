const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': '32ad0e3a99msh00cc6948049d195p1998f1jsnca8c3c518f49',
		'X-RapidAPI-Host': 'cricbuzz-cricket.p.rapidapi.com'
	}
};

fetch('https://cricbuzz-cricket.p.rapidapi.com/mcenter/v1/40381/hscard', options)
	.then(response => response.json())
	.then(response => console.log(response))
	.catch(err => console.error(err));
