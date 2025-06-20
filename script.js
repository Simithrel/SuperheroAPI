fetch('superhero.php?id=644')
    .then(response => response.json())
    .then(data => {
        const outputDiv = document.getElementById('output');

        if (data.response === 'success') {
            outputDiv.innerHTML = `
                <p><strong>Name:</strong> ${data.name}</p>
                <p><strong>Full Name:</strong> ${data['full-name']}</p>
                <p><strong>Place of Birth:</strong> ${data['place-of-birth']}</p>
                <p><strong>Place of Birth:</strong> ${data['aliases']}</p>
                <p><strong>Place of Birth:</strong> ${data['first-appearance']}</p>
                <p><strong>Place of Birth:</strong> ${data['publisher']}</p>
                <p><strong>Place of Birth:</strong> ${data['alignment']}</p>
            `;
        } else {
            outputDiv.innerText = 'Error: ' + data.error;
        }
    })
    .catch(error => {
        document.getElementById('output').innerText = 'Fetch error: ' + error;
    });