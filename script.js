document.getElementById('registrationForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = {
        firstName: capitalizeFirstLetter(document.getElementById('firstName').value),
        middleName: capitalizeFirstLetter(document.getElementById('middleName').value),
        lastName: capitalizeFirstLetter(document.getElementById('lastName').value),
        email: document.getElementById('email').value,
        password: sha256(document.getElementById('password').value)
    };

    try {
        const response = await fetch('http://localhost:3000/register', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(formData)
        });
        const result = await response.json();
        alert(result.message);
    } catch (error) {
        console.error('Error:', error);
    }
});

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
}
