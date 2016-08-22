# Photo Project Admin

This tool was designed as a solution for managing galleries for people during
live photo shoots. A use case for this would be doing quick/charitable family
portraits or portraits with Santa. The workflow is as follows:

1. Photographer using admin panel loads a new instance, writes down on a card
the access code

1. Photographs are taken using a tethered setup with presets to adjust images on
the fly

1. Photos are pressed to a local folder, then the photographer can drag and drop
them into the application.  On drop, the application uploads the photos to a
unique folder on the server (year/month/date/accessCode), then creates a new
line in the database with the folder location, other meta data and access code

1. The model can then go to the url (customer facing portal), enter their access
code and see all images.  Images can be shared, downloaded individually or
downloaded bulk in a zip folder.

## Work in Progress

Currently I am rewriting this tool from the ground up to be more efficient,
and easily portable.