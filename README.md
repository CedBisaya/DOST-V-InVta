# InVta
Event Management System
---  
The Event Management System is a web-system is designed for Department of Science and Technology – Region V (DOST-V) to manage users, events, attendance and reports. This system will simplify the event process by digitizing manual workflows and providing a centralized hub for coordination.

---  
Administrative Roles
---  
Super Admin: Provides full system oversight, including the management of event managers, comprehensive reporting, activity logs, and global configurations.

Event Manager: Offers dedicated tools for creating and monitoring specific events, managing Staff Marshals or Exhibitors, and generating event-specific reports.

---  
Core Web Features
---  
Hierarchical Event Planning: Robust support for "Parent-Child" event structures to manage multi-session or recurring events.

Digital Attendance Checking: QR code scanning functionality to efficiently verify and track user participation.

Gamification: A centralized dashboard to configure the Points System, allowing managers to incentivize attendee engagement.

Automated Certification: Integrated logic for the instant generation and distribution of digital certificates upon event completion.

User-Friendly Interface: A simple and intuitive design focused on providing a superior user experience.

---
Intallation/Setup
---
Follow these steps to get the project running locally:

## Steps

#### 1. Clone the repository: First, clone the project from your Git repository
```sh
    https://github.com/CedBisaya/DOST-V-InVta.git
    cd invta
```

#### 2. Install PHP Dependencies: Use Composer to install the required PHP dependencies for Laravel
```sh
    composer install
```

#### 3. Install JavaScript Dependencies: Install the required JavaScript packages (Bootstrap, etc.) using npm
```sh
    npm install
```

#### 4. Set Up Environment Variables: Create a .env file by copying the example file
```sh
    cp .env.example .env
```

#### 5. Open the .env file and update the following variables to match your local environment
```sh
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE= invta_db
    DB_USERNAME=root
    DB_PASSWORD=""
```

#### 6. Go to your XAMPP and create a database named "invta_db", make sure your XAMPP server is running

#### 7. Run the Artisan Key Generate Command
```sh
    php artisan key:generate
```

#### 8. Run the artisan migrate command to migrate the database to your local machine
```sh
    php artisan migrate
```

#### 9. Run the Application: Finally, run the application locally
```sh
    php artisan serve
    npm run dev
```
