@include('navbar')

<style>
    .about-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
    }

    .about-hero {
        text-align: center;
        margin-bottom: 40px;
    }

    .about-hero h1 {
        font-size: 36px;
        margin-bottom: 10px;
        color: #222;
    }

    .about-hero p {
        font-size: 18px;
        color: #666;
    }

    .about-content {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        margin-bottom: 40px;
    }

    .about-text {
        flex: 1;
        min-width: 280px;
    }

    .about-text h2 {
        font-size: 24px;
        margin-bottom: 10px;
        color: #444;
    }

    .about-text p {
        font-size: 16px;
        line-height: 1.6;
    }

    .about-image {
        flex: 1;
        min-width: 280px;
    }

    .about-image img {
        width: 100%;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .mission-boxes {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .mission-box {
        flex: 1;
        min-width: 250px;
        background: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .mission-box h3 {
        margin-bottom: 10px;
        color: #007BFF;
    }

    .mission-box p {
        font-size: 14px;
        color: #555;
    }

    @media (max-width: 768px) {
        .about-content {
            flex-direction: column;
        }

        .mission-boxes {
            flex-direction: column;
        }
    }
</style>

<div class="about-container">
    <div class="about-hero">
        <h1>About Us</h1>
        <p>Our journey, mission, and vision to make an impact through innovation.</p>
    </div>

    <div class="about-content">
        <div class="about-text">
            <h2>Who We Are</h2>
            <p>We are a passionate team of developers, designers, and dreamers working to create world-class digital solutions. Our focus is on simplicity, performance, and the end-user experience.</p>
            <p>From e-commerce platforms to AI-powered applications, we believe in the power of technology to transform businesses and lives.</p>
        </div>
        <div class="about-image">
            <img src="https://source.unsplash.com/600x400/?team,technology" alt="About Us">
        </div>
    </div>

    <div class="mission-boxes">
        <div class="mission-box">
            <h3>🚀 Our Mission</h3>
            <p>To empower people and businesses with meaningful digital products that solve real-world problems efficiently.</p>
        </div>
        <div class="mission-box">
            <h3>🎯 Our Vision</h3>
            <p>To be a global leader in digital transformation, known for innovation, quality, and human-centric design.</p>
        </div>
        <div class="mission-box">
            <h3>💡 Our Values</h3>
            <p>Integrity, excellence, and collaboration drive everything we do — ensuring we build responsibly and sustainably.</p>
        </div>
    </div>
</div>

@include('footer')
