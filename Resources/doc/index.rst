Let's face it: PHP markdown implementations are slow.

There is a better, faster language for this job: C.

This bundle integrates discount (http://github.com/Orc/discount),
the fastest markdown parser ever, written in C, into your Symfony2 project.

Installation
============

Lets start with installing discount, the fastest markdown implementation ever, written in C.

::

    cd /tmp
    git clone git://github.com/Orc/discount.git
    cd discount
    ./configure.sh
    make
    sudo make install

Add InsaneMarkdownBundle to your src/ dir
-------------------------------------

::

    $ git submodule add git://github.com/ornicar/OrnicarInsaneMarkdownBundle.git vendor/bundles/Ornicar/InsaneMarkdownBundle

Add the Ornicar namespace to your autoloader
----------------------------------------

::

    // app/autoload.php

    $loader->registerNamespaces(array(
        'Ornicar' => __DIR__.'/../vendor/bundles',
        // your other namespaces
    );

Add InsaneMarkdownBundle to your application kernel
-----------------------------------------

::

    // app/AppKernel.php

    public function registerBundles()
    {
        return array(
            // ...
            new Ornicar\InsaneMarkdownBundle\OrnicarInsaneMarkdownBundle(),
            // ...
        );
    }

Configure your project
----------------------

You must tell the bundle where the executable is::

    # app/config/config.yml

    ornicar_insane_markdown:
        path: /usr/bin/markdown

To find out where discount markdown is installed, you can type in your console::

    whereis markdown

Usage
=====

Transform your markdown text to HTML at the speed of light::

    $markdown = $container->get('ornicar_insane_markdown');

    echo $markdown->transform('Some mardown text');
    // <p>Some markdown text</p>

Twig
====

A twig filter is available::

    {{ someText|markdown }}
