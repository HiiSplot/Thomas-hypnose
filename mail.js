document.getElementById("contactForm").addEventListener("submit", function (event) {
  
    const formData = new FormData(event.target);
  
    
    const data = {
      lastName: formData.get("last-name"),
      firstName: formData.get("first-name"),
      email: formData.get("email"),
      subject: formData.get("subject"),
      message: formData.get("message"),
    };
  
    
    fetch("mailer.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then((response) => response.json()) // Analyser la réponse du serveur
      .then((result) => {
        console.log("Formulaire envoyé avec succès:", result);
        alert("Votre message a été envoyé !");
      })
  });