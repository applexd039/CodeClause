
function getUserDetails() {
  const username = document.getElementById('username').value;
  const url = `https://api.github.com/users/${username}`;

  fetch(url)
    .then(response => response.json())
    .then(data => {
      const resultDiv = document.getElementById('result');
      resultDiv.innerHTML = `
        <p><strong>Name:</strong> ${data.name}</p>
        <p><strong>Username:</strong> ${data.login}</p>
        <p><strong>Repositories:</strong> ${data.public_repos}</p>
        <p><strong>Followers:</strong> ${data.followers}</p>
        <p><strong>Following:</strong> ${data.following}</p>
        <p><strong>Bio:</strong> ${data.bio}</p>
        <p><a href="${data.html_url}" target="_blank">View Profile on GitHub</a></p>
      `;
    })
    .catch(error => {
      const resultDiv = document.getElementById('result');
      resultDiv.innerHTML = `<p>Error: ${error.message}</p>`;
    });
}