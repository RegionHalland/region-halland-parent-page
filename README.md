# Hämta "föräldern" till aktuell sida

## Hur man använder Region Hallands plugin "region-halland-parent-page"

Nedan följer instruktioner hur du kan använda pluginet "region-halland-parent-page".


## Användningsområde

Denna plugin skapar en array() med förälder-sidan


## Installation och aktivering

```sh
A) Hämta pluginen via Git eller läs in det med Composer
B) Installera Region Hallands plugin i Wordpress plugin folder
C) Aktivera pluginet inifrån Wordpress admin
```


## Hämta hem pluginet via Git

```sh
git clone https://github.com/RegionHalland/region-halland-parent-page.git
```


## Läs in pluginen via composer

Dessa två delar behöver du lägga in i din composer-fil

Repositories = var pluginen är lagrad, i detta fall på github

```sh
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/RegionHalland/region-halland-parent-page.git"
  },
],
```
Require = anger vilken version av pluginen du vill använda, i detta fall version 1.0.0

OBS! Justera så att du hämtar aktuell version.

```sh
"require": {
  "regionhalland/region-halland-parent-page": "1.0.0"
},
```


## Visa tillbaka-knapp via "Blade"

```sh
@php($myParentPage = get_region_halland_parent_page())
@if($myParentPage['has_back'] == 1)
<span>
  <a href="{{$myParentPage['url']}}">{{$myParentPage['post_title']}}
</span>
@endif
```


## Exempel på hur arrayen kan se ut (om det INTE finns en förälder)

```sh
array (size=1)
  'has_back' => int 0
```


## Exempel på hur arrayen kan se ut (om det finns en förälder)

```sh
array (size=30)
  'ID' => int 7
  'post_author' => string '1' (length=1)
  'post_date' => string '2018-11-21 17:08:46' (length=19)
  'post_date_gmt' => string '2018-11-21 16:08:46' (length=19)
  'post_content' => string 'Lorem ipsum dolor sit amet' (length=26)
  'post_title' => string 'Lorem Ipsum' (length=11)
  'post_excerpt' => string '' (length=0)
  'post_status' => string 'publish' (length=7)
  'comment_status' => string 'closed' (length=6)
  'ping_status' => string 'closed' (length=6)
  'post_password' => string '' (length=0)
  'post_name' => string 'lorem-ipsum' (length=11)
  'to_ping' => string '' (length=0)
  'pinged' => string '' (length=0)
  'post_modified' => string '2019-03-20 09:25:50' (length=19)
  'post_modified_gmt' => string '2019-03-20 08:25:50' (length=19)
  'post_content_filtered' => string '' (length=0)
  'post_parent' => int 0
  'guid' => string 'http://exempel.se/?page_id=7' (length=28)
  'menu_order' => int 0
  'post_type' => string 'page' (length=4)
  'post_mime_type' => string '' (length=0)
  'comment_count' => string '0' (length=1)
  'filter' => string 'raw' (length=3)
  'ancestors' => 
    array (size=0)
      empty
  'page_template' => string 'default' (length=7)
  'post_category' => 
    array (size=2)
      0 => int 3
      1 => int 4
  'tags_input' => 
    array (size=0)
      empty
  'url' => string 'http://exempel.se/lorem-ipsum/' (length=30)
  'has_back' => int 1
```


## Versionhistorik

### 1.0.0
- Första version