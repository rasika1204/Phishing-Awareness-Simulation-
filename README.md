# Phishing Awareness Simulation Platform

A Laravel-based web application designed to simulate phishing attacks in a controlled environment to educate and test employees or users on recognizing and responding to phishing attempts.

## Features

- **Campaign Management**: Create, manage, and track phishing simulation campaigns
- **Realistic Templates**: Includes realistic phishing templates like Facebook login
- **Analytics Dashboard**: Track user interaction and responses to phishing attempts
- **Educational Feedback**: Provide immediate feedback when users fall for simulated attacks
- **Detailed Reporting**: Generate comprehensive reports on campaign effectiveness

## Requirements

- PHP 8.0+
- Laravel 10.x
- MySQL Database
- Composer

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/rasika1204/Phishing-Awareness-Simulation-.git
   cd Phishing-Awareness-Simulation-
   ```

2. Install dependencies:
   ```
   composer install
   npm install
   ```

3. Copy the environment file:
   ```
   cp .env.example .env
   ```

4. Configure your database in the `.env` file.

5. Generate application key:
   ```
   php artisan key:generate
   ```

6. Run migrations:
   ```
   php artisan migrate
   ```

7. Start the development server:
   ```
   php artisan serve
   ```

## Usage

1. Login to the admin dashboard
2. Create a new phishing campaign
3. Select templates and target users
4. Launch the campaign
5. Monitor results through the dashboard

## Security Notes

This application is intended for educational and security awareness purposes only. Use responsibly and with proper authorization.
