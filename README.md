symfony-vagrant-up
===============

## Motivation

This repo is both a perfect starting point for a new Symfony 2.7.3, including a very simple yet sufficient provisioning, allowing anyone to get symfony running as quick as a `vagrant up`, and a catalog of feature showcases.

The showcases are available through the branches of this repo. Each one of them introduces feature, usually backing up a blog article detailing it.

## Installation

```
git clone git@github.com:harijoe/symfony-vagrant-up.git
cd symfony-vagrant-up/vagrant
vagrant up
```
You're done, enjoy : http://192.168.33.10

## Branches
Once the project is installed, feel free to navigate through the branches to try out the showcases.

### POC Multiple Files upload
`git checkout POC-multiple-files-upload`

This branch backs up this article : http://www.theodo.fr/blog/2015/07/manage-multiple-files-upload-in-symfony/

You need to execute the following commands to make it work :

```
app/console do:da:dr --force
app/console do:da:cr
app/console do:mi:mi -n
```

(Note : These commands will delete the current vagrant database and create another one)

Enjoy : http://192.168.33.10
