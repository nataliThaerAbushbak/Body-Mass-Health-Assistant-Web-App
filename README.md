# Body Mass Health Assistant Web App


A supportive and user-friendly web application that allows users to calculate their Body Mass Index (BMI) and receive helpful, non-judgmental resources to support healthy weight goals.  
The project is fully Dockerized to ensure easy setup and reproducibility for any developer.

## Table of Contents
Overview
Features
Technology Stack
Getting Started
Installation (Docker)
Configuration
How to Use
Project Structure
Development Notes
About

## Overview
The Body Mass Health Assistant Web App is designed to help users calculate their BMI using height and weight inputs.  
After calculating the BMI, the application clearly displays the BMI value and category.  
Users can optionally continue to a supportive resources page that provides apps and social media creators related to weight gain or weight loss in a positive and comfortable way.

## Features
- BMI calculation using height and weight
- Clear display of BMI value and category
- Optional guidance for weight gain or weight loss
- Supportive apps and social media resources
- Simple and friendly user interface
- Fully Dockerized application

## Technology Stack
Backend: PHP  
Frontend: HTML, CSS  
Web Server: Apache  
Containerization: Docker  
Platform: Cross-platform (Windows, Linux, macOS)

## Getting Started
This project can be run locally using Docker. No additional software or database configuration is required.

### Prerequisites
- Docker Desktop
- Git (optional, for cloning the repository)

### Installation (Docker)
1. Clone the repository:

git clone https://github.com/your-username/BMI-Health-Assistant.git  
cd BMI-Health-Assistant

2. Build the Docker image:

docker build -t bmi-app .

3. Run the Docker container:

docker run --name bmi-container -p 8080:80 bmi-app

4. Open the application in your browser:

http://localhost:8080

### Configuration
The application runs on port 80 inside the Docker container.  
It is mapped to port 8080 on the host machine.  
No environment variables are required.  
No database is used.

How to Use
1. Open http://localhost:8080 in a web browser  
2. Enter weight in kilograms and height in centimeters  
3. Click the "Calculate BMI" button  
4. View the calculated BMI value and category  
5. Click "Help me to lose/gain weight" to view supportive resources  

### Project Structure
BMI-Supportive-WebApp/
src/
- index.php
- apps.php
- web/
  - style.css
  - assets/
    - hello-kitty.png
docs/
- notes.md
- screenshots/
Dockerfile
.dockerignore
.gitignore
README.md

### Development Notes
All application source code is located inside the src directory.  
Documentation and screenshots are located inside the docs directory.  
Docker is used to ensure consistent behavior across different environments.

### About
Project: BMI Supportive Web App  
Course: Operating Systems Lab – Assignment #2 (Docker & GitHub)  
Student Name: Natali T H Abushbak  
Student ID: 220230818  

This project was created from scratch for educational purposes and does not use any external open-source codebase.
---
© 2025 Natali T. H. Abu Shbak
