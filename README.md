//git and github

git config --global user.name Ankur --- use to add your name  the terminal 
git config --global user.email ankuriwari@gmail.com ---to add a gmail account associated to github account
git config --list -- to check the list of all the account linked
# git basic command to github to vs code
git clone "link"
git status -- to check the status the repoo
git add .a--too add new or change file in your worling directory to stag git here a means all the files 
for a single file 
git add <file name> eg git add ankur.html

git commit -m "some message"
git push 
upload local repo content to the remote
git init
to initialize the empty git repository 

git add .
git commit -m ""
git remote add origin <link>
to add local to remote 
git remote -v 
to chech the current files is saved in which repo on remote

git branch
git branch -M main 
to change the current branch name 

git push origin main 
pushes all the changes from the local to remote 

problem that may arise during local to remote

1 when no remote link is set


error: src refspec main does not match any
error: failed to push some refs to 'origin'


2 git push origin main
 ! [rejected]        main -> main (fetch first)
error: failed to push some refs to 'https://github.com/Ankur0066/desktop-tutorial.git'
with hints

why :The error message indicates that the remote repository on GitHub contains commits that you don't have in your local repository. To resolve this issue, you'll need to pull the changes from the remote repository into your local repository, merge them if necessary, and then push the changes back to the remote repository


solution:
git pull origin main


here pull also may wil give thhe same error 
this means that both branches have received new commits since they last synchronized, and Git isn't sure how to reconcile them automatically.
solution
git config pull.rebase false
Merge: This is the default behavior for git pull. It merges the changes from the remote branch into your local branch.

git config pull.rebase true
Rebase: This applies your local commits on top of the changes fetched from the remote branch. It keeps the commit history linear but may lead to conflicts.

git config pull.ff only
Fast-forward only: This allows the pull to proceed only if it can be done via fast-forward. If not, it will fail, prompting you to resolve the issue manually.

git config pull.rebase false
git pull origin main



then at last do
git push origin main 
2 you added a wrong remote link to repo now want to change it 

git remote remove origin
check then
git remote -v
error solved



WORKING ON BRANCH 

git branch 

to remane the branch name
git branch -M main


to create a new branch
git checkout -b <branch name>


to navigate between branches
git chechout <branch name> 


to delete brach
git branch -d <name>

deleting without merging give warning 
git brach -D <name>



let us say testing branch was added 
git command will work till commit 

git push will throw error no upstream error as there is no stream set for new branch

to set upstream 
git push --set-upstream origin <branch-name>


now do 
git push origin main

git diff main 
to see difference of code or file in two different branches

git merge testing 
to merge testing branch with main

still even if we had merged and solved the pull request manually from the github no changes will be seeen in local account 
you can check by switching between the branches
so do 

git pull origin main
to see changes of remote in local 

**************************************************************************************************************
#git merge conflits
simultaneous changes in a particular file give merge conflicts

do commit tak in both then

git merge testing 
this will merge the testing in the main files error resolved

git status 
now it will show that your conflit is being resolved but there is an unmerged path file
so do commit tak again

then 

 git push origin  main
 done you now checkout if you need
 
 
 
 fixing some problems faced in github
 1 git add .
 but need to reset it dont want to add 
 so 
 git reset app.js  ///app,js me jo change kiya tha wo reset ho jaye
 
 git commit -m "nhi karna tha yrr"
 aaacha 
 git reset HEAD~1 // recent last comment will be reset
 this work for only 1 previos commit 
 
 for multiple resest 
 
use commit hash
 
 git reset <code>
 git reset --hard <code>
 
 
 git log 
 give log of all the commit made in the repo
 
 Git Commands and Usage Guide

This guide contains Git commands and their usage, including common issues and their resolutions.

Basic Commands

Cloning a Repository
git clone <repository_link>

Checking the Status
git status

Adding Files to Staging
To add all files to staging:
git add .

To add a specific file to staging:
git add <file_name>
# Example: git add ankur.html

Committing Changes
git commit -m "some message"

Pushing Changes to Remote
git push

Initializing a Repository
git init

Adding Remote Repository
git remote add origin <remote_repository_link>

Checking Remote Repository
git remote -v

Branching

Listing Branches
git branch

Renaming Current Branch
git branch -M main

Creating a New Branch
git checkout -b <new_branch_name>

Switching Between Branches
git checkout <branch_name>

Deleting a Branch
git branch -d <branch_name>

To force delete without merging:
git branch -D <branch_name>

Pushing New Branch to Remote
Set upstream and push:
git push --set-upstream origin <branch_name>

Merging and Rebasing

Merging Branches
git merge <branch_name>
# Example: git merge testing

Rebasing Branches
Set rebase mode:
git config pull.rebase true

Disable rebase mode:
git config pull.rebase false

Fast-forward only:
git config pull.ff only

Pulling Changes
git pull origin main

Common Issues

No Remote Link Set
Error:
error: src refspec main does not match any
error: failed to push some refs to 'origin'

Fetch First Error
Error:
git push origin main
! [rejected] main -> main (fetch first)
error: failed to push some refs to 'https://github.com/Ankur0066/desktop-tutorial.git'

Solution:
git pull origin main
# If pull gives same error
git config pull.rebase false
git pull origin main

Wrong Remote Link
To change remote link:
git remote remove origin
git remote -v

Viewing Differences

Viewing Differences Between Branches
git diff main

Merge Conflicts

Resolving Merge Conflicts
After resolving conflicts:
git add .
git commit -m "resolved merge conflict"

Resetting Staged Files
To unstage changes:
git reset <file_name>
# Example: git reset app.js

To undo last commit:
git reset HEAD~1

To reset multiple commits using commit hash:
git reset <commit_hash>

To hard reset:
git reset --hard

Viewing Commit Logs
git log

Notes

These commands and comments provide a quick reference to essential Git operations, including common tasks, troubleshooting, and managing branches.

 
 
 





