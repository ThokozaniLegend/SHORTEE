 <img id="logo" class="logo" src="images/logo 3.png" alt="Shortee Logo">

# **SHORTEE - URL Shortener Web Application**

Welcome to **SHORTEE**, the ultimate URL shortener that simplifies long URLs into short, shareable links. This project is designed to automate URL management and provide users with comprehensive analytics for their shortened URLs.

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
- [Challenges and Risks](#challenges-and-risks)
- [License](#license)

---

## **Introduction**

**SHORTEE** is a user-friendly and modern URL shortener designed for individuals and organizations looking to manage, optimize, and track their URLs effectively. With SHORTEE, users can shorten URLs, track click counts, manage their links, and receive valuable insights such as geo-location and referral information.

---

## **Features**
- **Shorten URLs:** Convert long URLs into short and manageable links.
- **Analytics Dashboard:** View real-time analytics, including click counts and referral data.
- **Custom Alias:** Create memorable and branded URLs with custom shortcodes.
- **Manage URLs:** Edit or delete previously created shortened URLs from your personal dashboard.
- **URL Expansion:** Retrieve the original long URL from a shortened version.
- **User-Friendly Interface:** A clean, responsive, and modern UI for easy navigation.

---

## **Technologies**

### **Frontend**
- **HTML** for structure
- **CSS** for styling and responsive design

### **Backend**
- **PHP** for server-side scripting
- **MySQL** for data storage and management
- **JavaScript** for client-side interaction and validation

---

## **Frontend**

The frontend of SHORTEE is designed with simplicity and user experience in mind. Below are the main components:

### **Files**
1. **`welcome.php`**  
   - Welcomes users and provides an entry point for login or registration.
   
2. **`register.php`**  
   - A registration page where users can sign up for SHORTEE.

3. **`login.php`**  
   - Login page for returning users.

4. **`index.php`**  
   - User dashboard where users can shorten URLs, view analytics, and manage their links.

5. **`style.css`**  
   - Custom styles to provide a clean, modern, and responsive interface.

---

## **Backend**

The backend powers all the operations in SHORTEE, providing robust functionality through various API endpoints for managing URLs and tracking analytics.

### **Files**
1. **`db_connect.php`**  
   - Manages the connection between the app and the MySQL database.

2. **`api_user_urls.php`**  
   - Fetches URLs for the logged-in user, enabling management (CRUD operations) of URLs.

3. **`api_expand.php`**  
   - Expands a short URL back to its original long form.

4. **`api_delete_url.php`**  
   - Deletes a specific URL from the system.

5. **`api_analytics.php`**  
   - Retrieves click counts and referral information for each shortened URL.

6. **`logout.php`**  
   - Logs the user out by ending their session and redirecting them to the welcome page.

---

## **APIs**

SHORTEE provides RESTful APIs for managing URLs, making it flexible for integration with other systems. Below are some key endpoints:

- **POST** `/api/shorten`: Create a new shortened URL.
- **GET** `/api/expand`: Retrieve the original URL from a shortened one.
- **GET** `/api/analytics`: Fetch analytics data for a specific URL.
- **GET** `/api/user_urls`: Fetch all URLs created by a specific user.
- **DELETE** `/api/delete_url`: Delete a shortened URL.

---

## **Setup Instructions**

### **Step 1: Clone the Repository**
```bash
git clone https://github.com/your-username/short-url.git
cd short-url
```

### **Step 2: Configure the Database**
- Import the database structure from the provided `database.sql` file.
- Update the `db_connect.php` file with your database credentials.

### **Step 3: Install Dependencies**
Make sure your environment has the following software installed:
- PHP
- MySQL
- Apache (or any other server software)

### **Step 4: Run the Application**
Start your local server (e.g., XAMPP or MAMP) and navigate to:
```bash
http://localhost/short-url
```

### **Step 5: Enjoy SHORTEE**
Log in or register to start shortening URLs and tracking analytics!

---

## **Challenges and Risks**

### **Technical Risks**
- **Scalability Issues:** SHORTEE might face performance issues under heavy load. Potential fixes include load balancing, caching, and database optimization.
- **Security Vulnerabilities:** We safeguard user data through HTTPS and strong authentication.

### **Non-Technical Risks**
- **Scope Creep:** Clear and controlled project management processes are in place to avoid unplanned feature requests.
- **Resource Constraints:** Contingency plans are set to ensure timely delivery even with resource limitations.


---

## **License**

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
