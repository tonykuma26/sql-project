@echo off
:: Navigate to the script's current directory automatically
cd /d "%~dp0"

echo ===================================================
echo             BEFORE YOU UPLOAD TO GITHUB           
echo ===================================================
echo  Please verify you have completed these steps:
echo.
echo  [1] Is this .bat file inside your specific project folder? 
echo      Current location: %CD%
echo.
echo  [2] Have you created/updated your README.md file?
echo.
echo  [3] Have you exported your latest SQL database from 
echo      phpMyAdmin and pasted the .sql file here?
echo ===================================================
echo.

:PROMPT
set /p AREYOUSEURE="Ready to deploy to GitHub? (Y/N): "
if /I "%AREYOUSEURE%" NEQ "Y" (
    echo.
    echo Upload cancelled. Make your adjustments and run this again.
    echo.
    pause
    exit /b
)

echo.
echo ===================================================
echo   STARTING AUTOMATED GITHUB UPLOAD...
echo ===================================================
echo.

:: Step 1: Configure Identity
echo [1/5] Setting Git identity...
git config --global user.email "your_email@example.com"
git config --global user.name "Your Name"

:: Step 2: Initialize Repository
echo [2/5] Initializing local Git repository...
git init

:: Step 3: Stage and Commit Files
echo [3/5] Staging files and creating snapshot...
git add .
git commit -m "Automated update with database and documentation"

:: Step 4: Set Branch and Link Repository
echo [4/5] Setting target branch and matching remote URL...
git branch -M main
git remote set-url origin https://github.com/tonykuma26/sql-project.git 2>nul || git remote add origin https://github.com/tonykuma26/sql-project.git

:: Step 5: Push to GitHub with Error Recovery
echo [5/5] Pushing files live to GitHub...
echo.
git push -u origin main

:: Check if the push failed (Error level greater than or equal to 1)
if %ERRORLEVEL% NEQ 0 (
    echo.
    echo ---------------------------------------------------
    echo  WARNING: Push rejected. Syncing online changes...
    echo ---------------------------------------------------
    echo Running: git pull origin main --rebase
    git pull origin main --rebase
    
    echo.
    echo Retrying push to GitHub...
    git push -u origin main
)

echo.
echo ===================================================
echo   SUCCESS! Refresh your GitHub repository page.
echo ===================================================
pause