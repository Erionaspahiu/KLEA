<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discover KLEA - Luxury Hotel & Resort</title>
    <link rel="stylesheet" href="styles.php">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="logo">KLEA</div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php#rooms">Rooms</a></li>
            <li><a href="index.php#dining">Dining</a></li>
            <li><a href="index.php#spa">Spa</a></li>
            <li><a href="index.php#contact">Contact</a></li>
        </ul>
        <button class="book-now" onclick="openBookingModal()">Book Now</button>
    </nav>

    <section class="discover-hero">
        <div class="discover-hero-content">
            <h1>Discover the KLEA Experience</h1>
            <p>Where Luxury Meets Tranquility</p>
        </div>
    </section>

    <section class="about-section">
        <div class="about-content">
            <h2>About KLEA</h2>
            <p>Nestled in the heart of Paradise City, KLEA Hotel & Resort stands as a beacon of luxury and sophistication. Our commitment to excellence is reflected in every detail, from our meticulously designed spaces to our world-class service.</p>
            <div class="features-grid">
                <div class="feature">
                    <i class="fas fa-concierge-bell"></i>
                    <h3>24/7 Concierge</h3>
                    <p>Our dedicated concierge team is available round the clock to fulfill your every request.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-wifi"></i>
                    <h3>High-Speed WiFi</h3>
                    <p>Stay connected with complimentary high-speed internet throughout the property.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-car"></i>
                    <h3>Valet Parking</h3>
                    <p>Enjoy convenient valet parking service with our professional staff.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-utensils"></i>
                    <h3>Fine Dining</h3>
                    <p>Experience culinary excellence at our award-winning restaurants.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="spa-wellness">
        <div class="spa-content">
            <h2>Spa & Wellness</h2>
            <div class="spa-grid">
                <div class="spa-info">
                    <h3>The KLEA Spa Experience</h3>
                    <p>Our luxury spa offers a haven of tranquility where ancient healing traditions meet modern therapeutic techniques. Each treatment is personalized to provide the ultimate relaxation experience.</p>
                    <ul class="spa-features">
                        <li><i class="fas fa-spa"></i> Luxury Treatment Rooms</li>
                        <li><i class="fas fa-hot-tub"></i> Hydrotherapy Pool</li>
                        <li><i class="fas fa-fire"></i> Sauna & Steam Room</li>
                        <li><i class="fas fa-leaf"></i> Zen Garden</li>
                        <li><i class="fas fa-dumbbell"></i> State-of-the-art Fitness Center</li>
                        <li><i class="fas fa-swimming-pool"></i> Indoor Heated Pool</li>
                    </ul>
                </div>
                <div class="spa-treatments-overview">
                    <h3>Signature Treatments</h3>
                    <div class="treatment-card">
                        <h4>KLEA Royal Massage</h4>
                        <p>A luxurious full-body massage combining various techniques to promote deep relaxation and wellness.</p>
                        <span class="duration">90 minutes</span>
                    </div>
                    <div class="treatment-card">
                        <h4>Gold Radiance Facial</h4>
                        <p>An opulent facial treatment using 24k gold-infused products for ultimate skin rejuvenation.</p>
                        <span class="duration">75 minutes</span>
                    </div>
                    <div class="treatment-card">
                        <h4>Couples Retreat</h4>
                        <p>A romantic spa journey for two, including massage, facial, and private relaxation time.</p>
                        <span class="duration">120 minutes</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="amenities">
        <div class="amenities-content">
            <h2>Hotel Amenities</h2>
            <div class="amenities-grid">
                <div class="amenity-card">
                    <img src="https://images.unsplash.com/photo-1575429198097-0414ec08e8cd?ixlib=rb-4.0.3" alt="Pool">
                    <h3>Infinity Pool</h3>
                    <p>Our stunning infinity pool offers breathtaking views of the city skyline.</p>
                </div>
                <div class="amenity-card">
                    <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-4.0.3" alt="Gym">
                    <h3>Fitness Center</h3>
                    <p>State-of-the-art equipment and personal training services available 24/7.</p>
                </div>
                <div class="amenity-card">
                    <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3" alt="Restaurant">
                    <h3>Gourmet Dining</h3>
                    <p>Multiple restaurants offering diverse culinary experiences.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="events-venues">
        <div class="events-content">
            <h2>Events & Venues</h2>
            <p>Host your special occasions in our elegant venues, from intimate gatherings to grand celebrations.</p>
            <div class="venues-grid">
                <div class="venue-card">
                    <h3>Grand Ballroom</h3>
                    <p>Capacity: 500 guests</p>
                    <p>Perfect for weddings and galas</p>
                </div>
                <div class="venue-card">
                    <h3>Executive Boardroom</h3>
                    <p>Capacity: 20 guests</p>
                    <p>Ideal for business meetings</p>
                </div>
                <div class="venue-card">
                    <h3>Garden Terrace</h3>
                    <p>Capacity: 150 guests</p>
                    <p>Beautiful outdoor venue</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>KLEA Hotel</h4>
                <p>Luxury redefined in every moment.</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php#rooms">Rooms & Suites</a></li>
                    <li><a href="index.php#dining">Dining</a></li>
                    <li><a href="index.php#spa">Spa</a></li>
                    <li><a href="index.php#contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Follow Us</h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 KLEA Hotel. All rights reserved.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html> 