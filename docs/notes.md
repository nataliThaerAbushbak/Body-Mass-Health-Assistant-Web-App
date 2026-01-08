# OS LAB – Assignment #2 (Docker & GitHub)
## Technical Notes

Student Name: Natali T H Abushbak  
Student ID: 220230818  
Project Name: BMI Supportive Web App  



## Biggest Docker Problem and How I Solved It

At the beginning of this assignment, I faced a problem where Docker commands did not work even though Docker was installed on my computer. When I tried to run the `docker build` command, Docker showed an error saying that it could not connect to the Docker engine.

At first, this was confusing because everything seemed to be installed correctly. After some investigation, I realized that Docker Desktop was not running. Once I opened Docker Desktop and waited until the engine started, the Docker commands worked normally without any problems.

This experience helped me understand how Docker works on Windows and the importance of having the Docker engine running.



## Most Important Git/GitHub Lesson I Learned

The most important lesson I learned from this assignment is that Git and GitHub are not just tools for uploading code. They are important for organizing a project and showing work in a clear and professional way.

I learned that writing meaningful commit messages and keeping the project structure clean makes it easier for others to understand the project. This assignment gave me a better understanding of how GitHub is used in real-world software development.


# Deployment Notes

## Challenges
- Understanding how Back4App containers map to traditional VPS requirements.
- Using deployment logs instead of direct SSH access.

## Solutions
- Confirmed with the T.A that Back4App Containers are acceptable as a VPS equivalent.
- Used deployment logs as evidence of Git cloning, Docker build, and container execution.
- Verified the application using the public Back4App URL.

