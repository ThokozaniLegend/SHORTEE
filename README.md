<img id="logo" class="logo" src="images/logo 3.png" alt="Shortee Logo">

# **SHORTEE - URL Shortener Web Application**

[![Deployed Site](https://img.shields.io/badge/Live%20Site-SHORTEE-blue)](https://yourdeployedsite.com)

Welcome to **SHORTEE**, a URL shortener designed to simplify URL management while providing users with valuable insights and analytics. This project was born out of a personal need to manage long, cumbersome URLs, and has evolved into a full-fledged tool for simplifying digital link sharing.

---

## **Table of Contents**
- [Introduction](#introduction)
- [Features](#features)
- [Technologies](#technologies)
- [Architecture](#architecture)
- [Frontend](#frontend)
- [Backend](#backend)
- [APIs](#apis)
- [Setup Instructions](#setup-instructions)
- [Usage](#usage)
- [Contributing](#contributing)
- [Related Projects](#related-projects)
- [Challenges and Risks](#challenges-and-risks)
- [License](#license)
- [Authors](#authors)

---

## **Introduction**

**SHORTEE** started as a personal project, fueled by the need to create a clean, automated, and efficient way to manage and track URLs. At its core, SHORTEE was designed to solve a common frustration — managing long, untidy URLs that clutter communications. 

But, as the project developed, I realized it could be so much more than just a URL shortener. By integrating analytics, I wanted to empower users to gain insights into how their URLs are being interacted with — clicks, geographic locations, referral information — making SHORTEE a powerful tool for both personal and professional use.

- **Deployed site:** [Visit SHORTEE Live](https://yourdeployedsite.com)
- **Final project blog article:** [Read Our Journey](https://medium.com/short-url-project)
- **Author(s) LinkedIn:**  
  - [Thokozani Jan Mahlangu](https://www.linkedin.com/in/thokozani-mahlangu)

---

## **Features**
- **Shorten URLs:** Turn long, cumbersome URLs into simple, shareable links.
- **Analytics Dashboard:** View real-time data on clicks, user locations, and referral sources.
- **Custom Alias Creation:** Personalize your links with custom shortcodes.
- **URL Management:** Edit or delete your URLs from a streamlined dashboard.
- **URL Expansion:** Retrieve the original long URL at any time.
- **User-Friendly Interface:** A responsive design for both desktop and mobile users.

---

## **Technologies**

### **Frontend**
- **HTML** and **CSS** for structure and styling
- **JavaScript** for client-side interactivity

### **Backend**
- **PHP** for server-side logic
- **MySQL** for database management
- **JavaScript** for client-side validation and dynamic updates

---

## **Architecture**
SHORTEE follows a simple yet effective architecture, designed with scalability and user experience in mind. 

- **Frontend:** Handles all user interaction and displays data.
- **Backend:** Manages the business logic, URL management, and analytics.
- **Database:** Stores user data, URLs, and analytics metrics.
  
This separation of concerns ensures that SHORTEE can scale effectively and is easy to maintain.

---

## **Frontend**

The frontend was designed with usability and aesthetics in mind. From the welcome page to the analytics dashboard, the goal was to keep things intuitive and easy to navigate.

### **Key Files:**
1. **`welcome.php`** - Introduces users and directs them to log in or register.
2. **`index.php`** - The main dashboard where users can shorten URLs, view analytics, and manage their links.
3. **`style.css`** - Defines the clean, modern look of SHORTEE, ensuring responsiveness across devices.

---

## **Backend**

The backend of SHORTEE is powered by a PHP-based API that handles all data requests and responses, ensuring smooth integration between the frontend and the database.

### **Key Files:**
1. **`db_connect.php`** - Handles the MySQL connection.
2. **`api_user_urls.php`** - API endpoint for CRUD operations on user URLs.
3. **`api_analytics.php`** - Fetches real-time data on URL interactions for analytics.

---

## **APIs**

SHORTEE’s backend exposes RESTful API endpoints that make it possible for users to interact with their URLs programmatically.

- **POST** `/api/shorten`: Shortens a new URL.
- **GET** `/api/expand`: Retrieves the original URL from a short link.
- **GET** `/api/analytics`: Provides detailed analytics on a URL.
- **DELETE** `/api/delete_url`: Removes a URL.

---

## **Setup Instructions**

### **Step 1: Clone the Repository**
```bash
git clone https://github.com/your-username/short-url.git
cd short-url
```

### **Step 2: Configure the Database**
- Import `database.sql`.
- Update `db_connect.php` with your MySQL credentials.

### **Step 3: Install Dependencies**
Ensure you have:
- PHP
- MySQL
- Apache (or another web server)

### **Step 4: Run the Application**
Navigate to:
```bash
http://localhost/short-url
```

---

## **Usage**

1. Log in or sign up for an account.
2. Paste a long URL into the input field.
3. Click **Shorten** to generate a short URL.
4. View analytics on the user dashboard.

**Screenshots:**  
Here's a preview of the SHORTEE dashboard:

![SHORTEE Dashboard](images/dashboard.png)

---

## **Contributing**

To contribute:
1. Fork the repository.
2. Create a feature branch (`git checkout -b feature/new-feature`).
3. Commit changes (`git commit -m 'Add new feature'`).
4. Push to your branch (`git push origin feature/new-feature`).
5. Open a pull request.

---

## **Related Projects**
- [Bitly](https://bitly.com)
- [TinyURL](https://tinyurl.com)
- [Rebrandly](https://www.rebrandly.com)

---

## **Challenges and Risks**

This project came with its fair share of challenges. The biggest technical hurdle was creating an efficient analytics module that would handle click counts and referral tracking in real-time. Initially, I struggled with performance issues, especially with handling concurrent requests when the number of users increased.

I also faced difficulties when securing user data. Implementing HTTPS and robust authentication mechanisms added a layer of complexity, but ultimately made the project more secure.

**Future Iterations:**  
For future versions of SHORTEE, I would love to add:
- **Bulk URL Shortening**: Allow users to upload a list of URLs and get them shortened all at once.
- **Improved Analytics**: Provide more detailed analytics, including heat maps of click locations.
- **Customizable Branding**: Allow users to add their own branding to URLs.

Despite the challenges, I’m proud of the learning curve and technical depth involved in bringing this project to life.

---

## **License**

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

---

## **Authors**

**Thokozani Jan Mahlangu**  
- [LinkedIn](https://www.linkedin.com/in/thokozani-mahlangu)
