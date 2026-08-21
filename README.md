# Project currently put on hiatus

# SocialBook Documentation

SocialBook is a social media-inspired web application built using modern web technologies including HTML, CSS, JavaScript (AJAX), PHP, JSON, and SQL.

---

## 📑 Table of Contents

1. [Login](#login)  
2. [Account Creation](#account-creation)  
3. [Navigation](#navigation)  
4. [Home Page](#home-page)  
5. [Search](#search)  
6. [Notifications](#notifications)  
7. [Post Creation](#post-creation)  
8. [Account Settings](#account-settings)  
9. [Logout](#logout)  
10. [Dark Mode](#dark-mode)

---

## Login

The login page allows users to access their accounts using a username and password. The login process includes input validation and uses asynchronous requests with AJAX and PHP to enhance the user experience.

- Credentials are submitted via AJAX to the backend for verification.  
- On success, a new session is created and stored in the database linked to the browser session ID.  
- Logged-in users are automatically redirected to the home page to avoid unnecessary login attempts.

---

## Account Creation

New users can create an account through a dedicated registration page accessible from the login screen.

- The registration form features field validation and is submitted asynchronously using AJAX and PHP.  
- Passwords are securely hashed before being stored in the database.  
- After successful registration, users are redirected to the login page.

---

## Navigation

Every page features a sidebar navigation menu for seamless site-wide navigation.

- The navigation sidebar is injected dynamically via PHP includes to maintain consistency across pages.  
- Provides quick links to all major app sections for easy access.

---

## Home Page

The home page displays a dynamic feed of posts and a random quote retrieved from a local JSON file.

### Post Structure

Each post contains the following elements:  
- Author’s username  
- Title and content of the post  
- Like button to toggle likes (asynchronous via AJAX)  
- Delete button available only to the post author  
- Display of total likes count

The liking and deleting functionality are handled asynchronously to ensure a smooth user experience.

---

## Search

The search page enables users to find other users by username, and follow them directly.

- Search results exclude the logged-in user’s own profile.  
- Searching and following actions are processed asynchronously with PHP, SQL, and AJAX.

---

## Notifications

The notifications page shows updates related to users who follow you.

- Unread notifications are visually indicated with a red dot.  
- A “Read All” button allows marking all notifications as read asynchronously using AJAX and PHP.

---

## Post Creation

Users can create new posts through a modal window activated by a “Create Post” button.

- The modal requires a post title and content, both with required validation.  
- Posts are submitted and stored in the database using PHP.

---

## Account Settings

The settings are organized into categories:

### User Information
- Change username (unique, non-empty)
- Edit bio (optional)
- Other profile-related settings (to be added)

### Privacy
- (Coming soon)

### Security
- Change password (in testing)
- (More to be added)

*(More sections will be introduced as the app evolves.)*

---

## Logout

The logout button is located at the bottom of the navigation sidebar.

- Logging out destroys the user’s session and removes it from the database.  
- This action is implemented with a simple PHP script.

---

## Dark Mode

The dark mode toggle is located at the bottom of the navigation sidebar.

- Switching the toggle changes the website theme from light to dark and vice versa.  
- The feature is partially implemented and still under development.

---

