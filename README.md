# Badge generator

This repository is generating badges for "How many commits since last release".

It looks at flow-php/flow readme for what repositories to use, then it check out
those repositories and count the commits since last release. We then generate a
SVG badge and commit it back to the repository.

This runs every hour or so.
