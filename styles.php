<?php
header("Content-type: text/css");
?>
/* Global Styles */
:root {
    --primary-color: #c5a47e;
    --secondary-color: #1a1a1a;
    --text-color: #333;
    --light-color: #fff;
    --transition: all 0.3s ease;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
}

body {
    font-family: 'Montserrat', sans-serif;
    line-height: 1.6;
    color: var(--text-color);
}

h1, h2, h3, h4 {
    font-family: 'Playfair Display', serif;
}

/* Navigation */
.navbar {
    position: fixed;
    top: 0;
    width: 100%;
    padding: 1.5rem 5%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: rgba(255, 255, 255, 0.95);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
}

.logo {
    font-family: 'Playfair Display', serif;
    font-size: 2rem;
    color: var(--primary-color);
    font-weight: 700;
}

.nav-links {
    display: flex;
    list-style: none;
    gap: 2rem;
}

.nav-links a {
    text-decoration: none;
    color: var(--secondary-color);
    font-weight: 500;
    transition: var(--transition);
}

.nav-links a:hover {
    color: var(--primary-color);
}

.book-now {
    background: var(--primary-color);
    color: var(--light-color);
    border: none;
    padding: 0.8rem 1.5rem;
    cursor: pointer;
    transition: var(--transition);
    font-family: 'Montserrat', sans-serif;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.book-now:hover {
    background: var(--secondary-color);
}

/* Hero Section */
.hero {
    height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3') center/cover;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: var(--light-color);
}

.hero-content h1 {
    font-size: 4rem;
    margin-bottom: 1rem;
}

.hero-content p {
    font-size: 1.5rem;
    margin-bottom: 2rem;
}

.cta-button {
    background: var(--primary-color);
    color: var(--light-color);
    border: none;
    padding: 1rem 2rem;
    font-size: 1.1rem;
    cursor: pointer;
    transition: var(--transition);
}

.cta-button:hover {
    background: var(--light-color);
    color: var(--primary-color);
}

/* Rooms Section */
.rooms {
    padding: 5rem 5%;
    background: #f9f9f9;
}

.rooms h2 {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 3rem;
    color: var(--secondary-color);
}

.room-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.room-card {
    background: var(--light-color);
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: var(--transition);
}

.room-card:hover {
    transform: translateY(-5px);
}

.room-card img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.room-card h3 {
    padding: 1.5rem 1.5rem 0.5rem;
    color: var(--secondary-color);
}

.room-card p {
    padding: 0 1.5rem 1.5rem;
    color: #666;
}

.room-button {
    margin: 0 1.5rem 1.5rem;
    background: transparent;
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
    padding: 0.8rem 1.5rem;
    cursor: pointer;
    transition: var(--transition);
}

.room-button:hover {
    background: var(--primary-color);
    color: var(--light-color);
}

/* Dining Section */
.dining {
    padding: 5rem 5%;
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixlib=rb-4.0.3') center/cover fixed;
    color: var(--light-color);
    text-align: center;
}

.dining h2 {
    font-size: 2.5rem;
    margin-bottom: 2rem;
}

.dining-text {
    max-width: 600px;
    margin: 0 auto;
}

.dining-button {
    margin-top: 2rem;
    background: transparent;
    border: 2px solid var(--light-color);
    color: var(--light-color);
    padding: 1rem 2rem;
    cursor: pointer;
    transition: var(--transition);
}

.dining-button:hover {
    background: var(--light-color);
    color: var(--secondary-color);
}

/* Spa Section */
.spa {
    padding: 5rem 5%;
    background: #f9f9f9;
    text-align: center;
}

.spa h2 {
    font-size: 2.5rem;
    margin-bottom: 2rem;
    color: var(--secondary-color);
}

.spa-button {
    margin-top: 2rem;
    background: var(--primary-color);
    color: var(--light-color);
    border: none;
    padding: 1rem 2rem;
    cursor: pointer;
    transition: var(--transition);
}

.spa-button:hover {
    background: var(--secondary-color);
}

/* Contact Section */
.contact {
    padding: 5rem 5%;
    background: var(--light-color);
}

.contact h2 {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 3rem;
    color: var(--secondary-color);
}

.contact-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 3rem;
    max-width: 1200px;
    margin: 0 auto;
}

.contact-info i {
    color: var(--primary-color);
    margin-right: 1rem;
}

.contact-info p {
    margin-bottom: 1rem;
}

.contact-form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.contact-form input,
.contact-form textarea {
    padding: 1rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-family: 'Montserrat', sans-serif;
}

.contact-form textarea {
    height: 150px;
    resize: vertical;
}

.submit-button {
    background: var(--primary-color);
    color: var(--light-color);
    border: none;
    padding: 1rem;
    cursor: pointer;
    transition: var(--transition);
}

.submit-button:hover {
    background: var(--secondary-color);
}

/* Footer */
.footer {
    background: var(--secondary-color);
    color: var(--light-color);
    padding: 4rem 5% 2rem;
}

.footer-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-bottom: 2rem;
}

.footer-section h4 {
    margin-bottom: 1rem;
    color: var(--primary-color);
}

.footer-section ul {
    list-style: none;
}

.footer-section ul li {
    margin-bottom: 0.5rem;
}

.footer-section a {
    color: var(--light-color);
    text-decoration: none;
    transition: var(--transition);
}

.footer-section a:hover {
    color: var(--primary-color);
}

.social-links {
    display: flex;
    gap: 1rem;
}

.social-links a {
    color: var(--light-color);
    font-size: 1.5rem;
    transition: var(--transition);
}

.social-links a:hover {
    color: var(--primary-color);
}

.footer-bottom {
    text-align: center;
    padding-top: 2rem;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

/* Responsive Design */
@media (max-width: 768px) {
    .navbar {
        padding: 1rem 5%;
    }

    .nav-links {
        display: none;
    }

    .hero-content h1 {
        font-size: 3rem;
    }

    .hero-content p {
        font-size: 1.2rem;
    }

    .room-grid {
        grid-template-columns: 1fr;
    }

    .contact-container {
        grid-template-columns: 1fr;
    }
}

/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    z-index: 2000;
    overflow-y: auto;
    padding: 20px;
}

.modal-content {
    position: relative;
    background: var(--light-color);
    margin: 20px auto;
    padding: 2rem;
    width: 90%;
    max-width: 800px;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
}

.close {
    position: absolute;
    top: 1rem;
    right: 1.5rem;
    font-size: 2rem;
    cursor: pointer;
    color: var(--secondary-color);
    background: none;
    border: none;
    padding: 0;
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.close:hover {
    background: #f0f0f0;
    color: var(--primary-color);
}

/* Booking Wizard Styles */
.booking-wizard {
    background: var(--light-color);
    max-width: 800px !important;
    margin: 20px auto !important;
    padding: 2rem !important;
}

.booking-progress {
    display: flex;
    justify-content: space-between;
    margin-bottom: 2rem;
    padding: 0 1rem;
    background: #f9f9f9;
    border-radius: 8px;
}

.progress-step {
    position: relative;
    text-align: center;
    flex: 1;
    padding: 1rem 0;
    color: #999;
    font-weight: 500;
}

.progress-step::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background: #ddd;
}

.progress-step.active {
    color: var(--primary-color);
}

.progress-step.active::after {
    background: var(--primary-color);
}

.booking-step {
    padding: 2rem;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 1rem;
}

.booking-step h2 {
    color: var(--primary-color);
    margin-bottom: 1.5rem;
    font-size: 1.8rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    color: var(--secondary-color);
    font-weight: 500;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 0.8rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-family: 'Montserrat', sans-serif;
    font-size: 1rem;
}

.form-group input:focus,
.form-group select:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 2px rgba(197, 164, 126, 0.2);
}

.button-group {
    display: flex;
    justify-content: space-between;
    margin-top: 2rem;
}

.next-step,
.prev-step,
.submit-booking {
    padding: 1rem 2rem;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: 'Montserrat', sans-serif;
    font-weight: 500;
    font-size: 1rem;
}

.next-step,
.submit-booking {
    background: var(--primary-color);
    color: var(--light-color);
}

.prev-step {
    background: #f0f0f0;
    color: var(--secondary-color);
}

.next-step:hover,
.submit-booking:hover {
    background: var(--secondary-color);
    transform: translateY(-2px);
}

.prev-step:hover {
    background: #e0e0e0;
    transform: translateY(-2px);
}

/* Room Selection Styles */
.room-selection {
    display: grid;
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.room-option {
    display: grid;
    grid-template-columns: 200px 1fr;
    gap: 1.5rem;
    background: #f9f9f9;
    padding: 1.5rem;
    border-radius: 8px;
    transition: transform 0.3s ease;
}

.room-option:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.room-option img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 4px;
}

.room-details {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.room-details h3 {
    color: var(--primary-color);
    margin-bottom: 0.5rem;
}

.room-details .price {
    font-weight: 500;
    color: var(--secondary-color);
    margin: 0.5rem 0;
}

.select-room {
    background: transparent;
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
    padding: 0.5rem 1rem;
    cursor: pointer;
    transition: var(--transition);
    width: fit-content;
}

.select-room:hover {
    background: var(--primary-color);
    color: var(--light-color);
}

.select-room.selected {
    background: var(--primary-color);
    color: var(--light-color);
}

/* Extras Selection Styles */
.extras-selection {
    display: grid;
    gap: 1rem;
    margin-bottom: 2rem;
}

.extra-option {
    display: flex;
    align-items: center;
    padding: 1.5rem;
    background: #f9f9f9;
    border-radius: 8px;
    transition: transform 0.3s ease;
}

.extra-option:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.extra-option input[type="checkbox"] {
    margin-right: 1rem;
}

.extra-option label {
    flex: 1;
}

.extra-option .price {
    color: var(--secondary-color);
    font-weight: 500;
}

/* Payment Styles */
.booking-summary {
    background: #f9f9f9;
    padding: 1.5rem;
    border-radius: 8px;
    margin-bottom: 2rem;
}

.booking-summary h3 {
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.total-amount {
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 1px solid #ddd;
}

.total-amount h4 {
    color: var(--secondary-color);
    font-size: 1.2rem;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .modal-content,
    .booking-wizard {
        width: 95%;
        margin: 10px auto;
        padding: 1.5rem;
    }

    .room-option {
        grid-template-columns: 1fr;
    }

    .form-row {
        grid-template-columns: 1fr;
    }

    .booking-progress {
        font-size: 0.9rem;
    }
}

/* Discover Page Styles */
.discover-hero {
    height: 70vh;
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?ixlib=rb-4.0.3') center/cover;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: var(--light-color);
}

.discover-hero-content h1 {
    font-size: 3.5rem;
    margin-bottom: 1rem;
}

.discover-hero-content p {
    font-size: 1.5rem;
}

/* About Section */
.about-section {
    padding: 5rem 5%;
    background: var(--light-color);
}

.about-content {
    max-width: 1200px;
    margin: 0 auto;
}

.about-content h2 {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 2rem;
    color: var(--secondary-color);
}

.about-content > p {
    text-align: center;
    max-width: 800px;
    margin: 0 auto 3rem;
    font-size: 1.1rem;
    line-height: 1.8;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
}

.feature {
    text-align: center;
    padding: 2rem;
    background: #f9f9f9;
    border-radius: 8px;
    transition: var(--transition);
}

.feature:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.feature i {
    font-size: 2.5rem;
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.feature h3 {
    margin-bottom: 1rem;
    color: var(--secondary-color);
}

/* Spa & Wellness Section */
.spa-wellness {
    padding: 5rem 5%;
    background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
                url('https://images.unsplash.com/photo-1544161515-4ab6ce6db874?ixlib=rb-4.0.3') center/cover fixed;
    color: var(--light-color);
}

.spa-content {
    max-width: 1200px;
    margin: 0 auto;
}

.spa-content h2 {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 3rem;
}

.spa-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 3rem;
}

.spa-features {
    list-style: none;
    margin-top: 2rem;
}

.spa-features li {
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
}

.spa-features i {
    margin-right: 1rem;
    color: var(--primary-color);
}

.treatment-card {
    background: rgba(255, 255, 255, 0.1);
    padding: 1.5rem;
    border-radius: 8px;
    margin-bottom: 1rem;
}

.treatment-card h4 {
    color: var(--primary-color);
    margin-bottom: 0.5rem;
}

.duration {
    display: inline-block;
    margin-top: 1rem;
    font-style: italic;
    color: var(--primary-color);
}

/* Amenities Section */
.amenities {
    padding: 5rem 5%;
    background: var(--light-color);
}

.amenities-content {
    max-width: 1200px;
    margin: 0 auto;
}

.amenities h2 {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 3rem;
    color: var(--secondary-color);
}

.amenities-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.amenity-card {
    background: #f9f9f9;
    border-radius: 8px;
    overflow: hidden;
    transition: var(--transition);
}

.amenity-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.amenity-card img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.amenity-card h3 {
    padding: 1.5rem 1.5rem 0.5rem;
    color: var(--secondary-color);
}

.amenity-card p {
    padding: 0 1.5rem 1.5rem;
    color: #666;
}

/* Events & Venues Section */
.events-venues {
    padding: 5rem 5%;
    background: #f9f9f9;
}

.events-content {
    max-width: 1200px;
    margin: 0 auto;
    text-align: center;
}

.events-content h2 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    color: var(--secondary-color);
}

.events-content > p {
    margin-bottom: 3rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.venues-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
}

.venue-card {
    background: var(--light-color);
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: var(--transition);
}

.venue-card:hover {
    transform: translateY(-5px);
}

.venue-card h3 {
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.venue-card p {
    margin-bottom: 0.5rem;
    color: #666;
}

/* Responsive Styles for Discover Page */
@media (max-width: 768px) {
    .discover-hero-content h1 {
        font-size: 2.5rem;
    }

    .discover-hero-content p {
        font-size: 1.2rem;
    }

    .spa-grid {
        grid-template-columns: 1fr;
    }

    .features-grid,
    .amenities-grid,
    .venues-grid {
        grid-template-columns: 1fr;
    }
} 