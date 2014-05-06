/*
Template: blog-detail
Title: Flat File Relaunch 
Description:
Date: 4/12/2014
*/

The relaunch of any personal property, like your blog or portfolio, is an opportunity to trim and focus your content. It's also a chance to expand your skill set. I recently unified all my existing front end components under the [Formstone](http://formstone.it/) moniker. The process was tedious and included updating the code base, documentation and demos. The final step was to launch a brand new site. I decided to use this as an opportunity to explore what has been developing in the PHP space.  

## Database Woes

The biggest bottleneck in my workflow is a 'feature' of my (admittedly cheap) shared hosting. It's tailored around n00bs and only allows access to databases through a web based control panel. The old site ran on [BigTree CMS](http://www.bigtreecms.org/) and required keeping the local and live databases in sync. It's a pain to login then click, click, click - just to update a single entry. The quest to ditch the database lead me to the realm of the flat file. 

*Now, you may being saying to yourself "just switch hosts, ya' dummy." Well, I've considered that. But it doesn't make sense to jump ship because of one small inconvenience. I'm otherwise pleased with the performance-to-value ratio of my current setup. It also forced me to tinker, which is where some of the best moments of inspiration can happen.*

## Entering the Flatland 

Flat file setups are what all the kids are talking about these days, and for good reason. They offer simple content editing, portability through version control and incredible speed. All because one huge piece of the stack is gone, allowing the server to just do it's thing. 

I started my search by outlining a few pieces of criteria to consider when sizing up the contenders:

- PHP based
- Open source 
- File system based page tree
- Fast page rendering 
- Ability to extend or add functionality

A quick search then lead me to a short lists of standouts that seemed worth further exploration:

- [Statamic](http://www.statamic.com/)
- [Kirby](http://getkirby.com/)
- [Dropplets](http://dropplets.com/)
- [Pico](http://picocms.org/)
- [Anchor](http://anchorcms.com/)

## Pico FTW

Anchor and Dropplets are too blog centric for my use; Statemic and Kirby are both under paid licenses. In the end, Pico was the perfect fit. Just enough out-of-the-box functionality with the right amount of room to tinker. In 10 minuets I was editing themes and building [plugins](https://github.com/picocms/Pico/wiki/Pico-Plugins). Two days later I had a site ready to ship. I also realized the power of both [Twig](http://twig.sensiolabs.org/) and [Markdown](https://daringfireball.net/projects/markdown/), but that's a post for another day.

## Gone But Not Forgotten

Am I swearing off databases forever? Not a chance. Databases allow for advanced querying and complicated relationships. They enable large teams to work cooperatively through a CMS's web interface. But I'm one developer running a simple site. In the end it's all about choosing the right tool for the job. 