<?php
require_once 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['contact_form'])) {
        $name = sanitizeInput($_POST['name']);
        $email = sanitizeInput($_POST['email']);
        $message = sanitizeInput($_POST['message']);
        
        // Process contact form
        // You can add email sending functionality here
        $response = handleSuccess("Message sent successfully!");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KLEA - Luxury Hotel & Resort</title>
    <link rel="stylesheet" href="styles.php">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="logo">KLEA</div>
        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#rooms">Rooms</a></li>
            <li><a href="#dining">Dining</a></li>
            <li><a href="#spa">Spa</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <button class="book-now" onclick="openBookingModal()">Book Now</button>
    </nav>

    <header id="home" class="hero">
        <div class="hero-content">
            <h1>Welcome to KLEA</h1>
            <p>Experience Unparalleled Luxury</p>
            <button class="cta-button" onclick="window.location.href='discover.php'">Discover More</button>
        </div>
    </header>

    <section id="rooms" class="rooms">
        <h2>Luxurious Accommodations</h2>
        <div class="room-grid">
            <div class="room-card">
                <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?ixlib=rb-4.0.3" alt="Deluxe Suite">
                <h3>Deluxe Suite</h3>
                <p>Immerse yourself in refined luxury with our spacious deluxe suites.</p>
                <button class="room-button" onclick="openRoomDetails('deluxe')">View Details</button>
            </div>
            <div class="room-card">
                <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-4.0.3" alt="Presidential Suite">
                <h3>Presidential Suite</h3>
                <p>The epitome of luxury living with panoramic views.</p>
                <button class="room-button">View Details</button>
            </div>
            <div class="room-card">
                <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?ixlib=rb-4.0.3" alt="Royal Villa">
                <h3>Royal Villa</h3>
                <p>A private sanctuary with exclusive amenities and services.</p>
                <button class="room-button">View Details</button>
            </div>
        </div>
    </section>

    <section id="dining" class="dining">
        <h2>Fine Dining</h2>
        <div class="dining-content">
            <div class="dining-text">
                <h3>Culinary Excellence</h3>
                <p>Experience world-class cuisine crafted by our renowned chefs using the finest ingredients.</p>
                <button class="dining-button" onclick="viewMenu()">View Menu</button>
            </div>
        </div>
    </section>

    <section id="spa" class="spa">
        <h2>Wellness & Spa</h2>
        <div class="spa-content">
            <div class="spa-text">
                <h3>Rejuvenate Your Senses</h3>
                <p>Indulge in our premium spa treatments and wellness programs.</p>
                <button class="spa-button" onclick="bookSpa()">Book Treatment</button>
            </div>
        </div>
    </section>

    <section id="contact" class="contact">
        <h2>Contact Us</h2>
        <div class="contact-container">
            <div class="contact-info">
                <h3>Get in Touch</h3>
                <p><i class="fas fa-map-marker-alt"></i> 123 Luxury Avenue, Paradise City</p>
                <p><i class="fas fa-phone"></i> +1 (555) 123-4567</p>
                <p><i class="fas fa-envelope"></i> reservations@kleahotel.com</p>
            </div>
            <form class="contact-form" method="POST">
                <input type="hidden" name="contact_form" value="1">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <textarea name="message" placeholder="Message" required></textarea>
                <button type="submit" class="submit-button">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Modals -->
    <div id="bookingModal" class="modal">
        <div class="modal-content booking-wizard">
            <button class="close" onclick="closeModal('bookingModal')">&times;</button>
            <div class="booking-progress">
                <div class="progress-step active" data-step="1">Details</div>
                <div class="progress-step" data-step="2">Room</div>
                <div class="progress-step" data-step="3">Extras</div>
                <div class="progress-step" data-step="4">Payment</div>
            </div>
            
            <!-- Step 1: Guest Details -->
            <div class="booking-step" id="step1">
                <h2>Guest Details</h2>
                <form id="guestDetailsForm" class="booking-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" id="phone" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="adults">Adults</label>
                            <select id="adults" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="children">Children</label>
                            <select id="children">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="checkIn">Check-in Date</label>
                            <input type="date" id="checkIn" required>
                        </div>
                        <div class="form-group">
                            <label for="checkOut">Check-out Date</label>
                            <input type="date" id="checkOut" required>
                        </div>
                    </div>
                    <div class="button-group">
                        <button type="button" class="next-step">Next</button>
                    </div>
                </form>
            </div>

            <!-- Step 2: Room Selection -->
            <div class="booking-step" id="step2" style="display: none;">
                <h2>Select Your Room</h2>
                <div class="room-selection">
                    <div class="room-option">
                        <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?ixlib=rb-4.0.3" alt="Deluxe Suite">
                        <div class="room-details">
                            <div>
                                <h3>Deluxe Suite</h3>
                                <p>King-size bed, city view, luxury bathroom</p>
                                <p class="price">$500/night</p>
                            </div>
                            <button class="select-room" data-room="deluxe">Select</button>
                        </div>
                    </div>
                    <div class="room-option">
                        <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-4.0.3" alt="Presidential Suite">
                        <div class="room-details">
                            <div>
                                <h3>Presidential Suite</h3>
                                <p>Separate living area, panoramic views</p>
                                <p class="price">$1,500/night</p>
                            </div>
                            <button class="select-room" data-room="presidential">Select</button>
                        </div>
                    </div>
                    <div class="room-option">
                        <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?ixlib=rb-4.0.3" alt="Royal Villa">
                        <div class="room-details">
                            <div>
                                <h3>Royal Villa</h3>
                                <p>Private pool, butler service</p>
                                <p class="price">$2,500/night</p>
                            </div>
                            <button class="select-room" data-room="royal">Select</button>
                        </div>
                    </div>
                </div>
                <div class="button-group">
                    <button class="prev-step">Previous</button>
                    <button class="next-step" disabled>Next</button>
                </div>
            </div>

            <!-- Step 3: Extras -->
            <div class="booking-step" id="step3" style="display: none;">
                <h2>Additional Services</h2>
                <div class="extras-selection">
                    <div class="extra-option">
                        <input type="checkbox" id="airportTransfer">
                        <label for="airportTransfer">Airport Transfer</label>
                        <span class="price">$100</span>
                    </div>
                    <div class="extra-option">
                        <input type="checkbox" id="breakfast">
                        <label for="breakfast">Daily Breakfast</label>
                        <span class="price">$50 per person/day</span>
                    </div>
                    <div class="extra-option">
                        <input type="checkbox" id="earlyCheckin">
                        <label for="earlyCheckin">Early Check-in</label>
                        <span class="price">$100</span>
                    </div>
                    <div class="extra-option">
                        <input type="checkbox" id="lateCheckout">
                        <label for="lateCheckout">Late Check-out</label>
                        <span class="price">$100</span>
                    </div>
                    <div class="extra-option">
                        <input type="checkbox" id="spaPackage">
                        <label for="spaPackage">Welcome Spa Package</label>
                        <span class="price">$200</span>
                    </div>
                </div>
                <div class="button-group">
                    <button class="prev-step">Previous</button>
                    <button class="next-step">Next</button>
                </div>
            </div>

            <!-- Step 4: Payment -->
            <div class="booking-step" id="step4" style="display: none;">
                <h2>Payment Details</h2>
                <div class="booking-summary">
                    <h3>Booking Summary</h3>
                    <div id="bookingSummary"></div>
                    <div class="total-amount">
                        <h4>Total Amount: <span id="totalAmount">$0</span></h4>
                    </div>
                </div>
                <form id="paymentForm" class="payment-form">
                    <div class="form-group">
                        <label for="cardName">Name on Card</label>
                        <input type="text" id="cardName" required>
                    </div>
                    <div class="form-group">
                        <label for="cardNumber">Card Number</label>
                        <input type="text" id="cardNumber" required pattern="[0-9]{16}" maxlength="16">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="expiryDate">Expiry Date</label>
                            <input type="text" id="expiryDate" placeholder="MM/YY" required maxlength="5">
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" required pattern="[0-9]{3,4}" maxlength="4">
                        </div>
                    </div>
                    <div class="button-group">
                        <button class="prev-step">Previous</button>
                        <button type="submit" class="submit-booking">Confirm Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="roomDetailsModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('roomDetailsModal')">&times;</span>
            <h2 class="room-title"></h2>
            <p class="room-description"></p>
            <p class="room-price"></p>
            <button class="book-now" onclick="closeModal('roomDetailsModal'); openBookingModal();">Book This Room</button>
        </div>
    </div>

    <div id="menuModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('menuModal')">&times;</span>
            <h2>Our Menu</h2>
            <div class="menu-content">
                <h3>Fine Dining Menu</h3>
                <div class="menu-section">
                    <h4>Appetizers</h4>
                    <p>Caviar Selection - $150</p>
                    <p>Truffle Risotto - $85</p>
                    <p>Foie Gras - $95</p>
                </div>
                <div class="menu-section">
                    <h4>Main Courses</h4>
                    <p>Wagyu Beef Tenderloin - $180</p>
                    <p>Mediterranean Sea Bass - $140</p>
                    <p>Organic Chicken Supreme - $110</p>
                </div>
                <div class="menu-section">
                    <h4>Desserts</h4>
                    <p>Valrhona Chocolate Soufflé - $45</p>
                    <p>Crème Brûlée - $35</p>
                    <p>Seasonal Fruit Tart - $40</p>
                </div>
            </div>
        </div>
    </div>

    <div id="spaModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('spaModal')">&times;</span>
            <h2>Spa Treatments</h2>
            <div class="spa-treatments">
                <div class="treatment">
                    <h3>Signature Massage</h3>
                    <p>90 minutes - $200</p>
                    <button class="book-treatment" onclick="closeModal('spaModal'); openBookingModal();">Book Now</button>
                </div>
                <div class="treatment">
                    <h3>Luxury Facial</h3>
                    <p>60 minutes - $180</p>
                    <button class="book-treatment" onclick="closeModal('spaModal'); openBookingModal();">Book Now</button>
                </div>
                <div class="treatment">
                    <h3>Body Wrap</h3>
                    <p>120 minutes - $250</p>
                    <button class="book-treatment" onclick="closeModal('spaModal'); openBookingModal();">Book Now</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>KLEA Hotel</h4>
                <p>Luxury redefined in every moment.</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#rooms">Rooms & Suites</a></li>
                    <li><a href="#dining">Dining</a></li>
                    <li><a href="#spa">Spa</a></li>
                    <li><a href="#contact">Contact</a></li>
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