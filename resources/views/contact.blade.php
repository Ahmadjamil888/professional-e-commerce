@include('navbar')

<style>
    .contact-container {
        max-width: 1100px;
        margin: 50px auto;
        padding: 20px;
        font-family: 'Segoe UI', sans-serif;
        color: #333;
    }

    .contact-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .contact-header h1 {
        font-size: 36px;
        margin-bottom: 10px;
    }

    .contact-header p {
        font-size: 18px;
        color: #555;
    }

    .contact-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .contact-form label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .contact-form input,
    .contact-form textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 15px;
        resize: vertical;
    }

    .contact-form button {
        background-color: #007BFF;
        color: white;
        padding: 12px 18px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    .contact-form button:hover {
        background-color: #0056b3;
    }

    .contact-info {
        margin-top: 40px;
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        color: #444;
    }

    .contact-info div {
        flex: 1;
        min-width: 250px;
    }

    .contact-info h3 {
        margin-bottom: 10px;
        color: #007BFF;
    }

    @media (max-width: 768px) {
        .contact-info {
            flex-direction: column;
        }
    }
</style>

<div class="contact-container">
    <div class="contact-header">
        <h1>Contact Us</h1>
        <p>Have questions or feedback? We'd love to hear from you.</p>
    </div>

    <form action="#" method="POST" class="contact-form">
        @csrf
        <div>
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="message">Your Message</label>
            <textarea id="message" name="message" rows="6" required></textarea>
        </div>

        <button type="submit">Send Message</button>
    </form>

    <div class="contact-info">
        <div>
            <h3>📍 Address</h3>
            <p>Main Blvd, Lahore, Pakistan</p>
        </div>
        <div>
            <h3>📧 Email</h3>
            <p>support@yourdomain.com</p>
        </div>
        <div>
            <h3>📞 Phone</h3>
            <p>+92 300 1234567</p>
        </div>
    </div>
</div>

@include('footer')
