<?php
include_once(__DIR__ . "/../template.php");
top(Page::PHOTOS);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/scripts/galleria.js"></script>

<div id="galleria"></div>

<script>
  var images = [
    {
      image: '/images/half_moon_bay.jpg',
      thumb: '/images/thumbs/half_moon_bay.jpg',
      title: 'Half Moon Bay, CA'
    },
    {
      image: '/images/bus.jpg',
      thumb: '/images/thumbs/bus.jpg',
      title: 'San Francisco, CA'
    },
    {
      image: '/images/magnuson.jpg',
      thumb: '/images/thumbs/magnuson.jpg',
      title: 'Magnuson Park, Seattle, WA'
    },
    {
      image: '/images/central_park_3.jpg',
      thumb: '/images/thumbs/central_park_3.jpg',
      title: 'Central Park, New York'
    },
    {
      image: '/images/uyuni_3.jpg',
      thumb: '/images/thumbs/uyuni_3.jpg',
      title: 'Salar de Uyuni, Bolivia'
    },
    {
      image: '/images/pike_place.jpg',
      thumb: '/images/thumbs/pike_place.jpg',
      title: 'Pike Place Market, Seattle, WA'
    },
    {
      image: '/images/napali_1.jpg',
      thumb: '/images/thumbs/napali_1.jpg',
      title: 'Na Pali Coast, HI'
    },
    {
      image: '/images/cascade_pass.jpg',
      thumb: '/images/thumbs/cascade_pass.jpg',
      title: 'Cascade Pass, North Cascades National Park, WA'
    },
    {
      image: '/images/central_park_3.jpg',
      thumb: '/images/thumbs/central_park_3.jpg',
      title: 'Central Park, New York'
    },
    {
      image: '/images/loop_head.jpg',
      thumb: '/images/thumbs/loop_head.jpg',
      title: 'Loop Head Lighthouse, Ireland'
    },
    {
      image: '/images/uyuni_4.jpg',
      thumb: '/images/thumbs/uyuni_4.jpg',
      title: 'Salar de Uyuni, Bolivia'
    },
    {
      image: '/images/new_years.jpg',
      thumb: '/images/thumbs/new_years.jpg',
      title: 'San Francisco, CA'
    },
    {
      image: '/images/pumpkin_1.jpg',
      thumb: '/images/thumbs/pumpkin_1.jpg',
      title: 'Pumpkin Picking, WA'
    },
    {
      image: '/images/vancouver.jpg',
      thumb: '/images/thumbs/vancouver.jpg',
      title: 'Vancouver, Canada'
    },
    {
      image: '/images/tulip_1.jpg',
      thumb: '/images/thumbs/tulip_1.jpg',
      title: 'Mount Vernon, WA'
    },
    {
      image: '/images/golden_gardens.jpg',
      thumb: '/images/thumbs/golden_gardens.jpg',
      title: 'Golden Gardens Park, Seattle, WA'
    },
    {
      image: '/images/denali_2.jpg',
      thumb: '/images/thumbs/denali_2.jpg',
      title: 'Denali National Park, AK'
    },
    {
      image: '/images/tower_bridge.jpg',
      thumb: '/images/thumbs/tower_bridge.jpg',
      title: 'London, United Kingdom'
    },
    {
      image: '/images/snow.jpg',
      thumb: '/images/thumbs/snow.jpg',
      title: 'Seattle, WA'
    },
    {
      image: '/images/pumpkin_2.jpg',
      thumb: '/images/thumbs/pumpkin_2.jpg',
      title: 'Pumpkin Picking, WA'
    },
    {
      image: '/images/treasure_island.jpg',
      thumb: '/images/thumbs/treasure_island.jpg',
      title: 'Treasure Island, CA'
    },
    {
      image: '/images/salkantay_1.jpg',
      thumb: '/images/thumbs/salkantay_1.jpg',
      title: 'Salkantay Trek, Peru'
    },
    {
      image: '/images/point_reyes_2.jpg',
      thumb: '/images/thumbs/point_reyes_2.jpg',
      title: 'Point Reyes National Seashore, CA'
    },
    {
      image: '/images/denali_1.jpg',
      thumb: '/images/thumbs/denali_1.jpg',
      title: 'Denali National Park, AK'
    },
    {
      image: '/images/new_years_2.jpg',
      thumb: '/images/thumbs/new_years_2.jpg',
      title: 'San Francisco, CA'
    },
    {
      image: '/images/banff_4.jpg',
      thumb: '/images/thumbs/banff_4.jpg',
      title: 'Banff National Park, Canada'
    },
    {
      image: '/images/wedding.jpg',
      thumb: '/images/thumbs/wedding.jpg',
      title: 'Calistoga, CA'
    },
    {
      image: '/images/tahoe.jpg',
      thumb: '/images/thumbs/tahoe.jpg',
      title: 'Lake Tahoe, CA'
    },
    {
      image: '/images/central_park_1.jpg',
      thumb: '/images/thumbs/central_park_1.jpg',
      title: 'Central Park, New York'
    },
    {
      image: '/images/birthday_1.jpg',
      thumb: '/images/thumbs/birthday_1.jpg',
      title: 'Seattle, WA'
    },
    {
      image: '/images/banff_2.jpg',
      thumb: '/images/thumbs/banff_2.jpg',
      title: 'Banff National Park, Canada'
    },
    {
      image: '/images/machu_picchu_2.jpg',
      thumb: '/images/thumbs/machu_picchu_2.jpg',
      title: 'Machu Picchu, Peru'
    },
    {
      image: '/images/napali_2.jpg',
      thumb: '/images/thumbs/napali_2.jpg',
      title: 'Na Pali Coast, HI'
    },
    {
      image: '/images/banff_1.jpg',
      thumb: '/images/thumbs/banff_1.jpg',
      title: 'Banff National Park, Canada'
    },
    {
      image: '/images/uyuni_1.jpg',
      thumb: '/images/thumbs/uyuni_1.jpg',
      title: 'Salar de Uyuni, Bolivia'
    },
    {
      image: '/images/first.jpg',
      thumb: '/images/thumbs/first.jpg',
      title: 'Seattle, WA'
    },
    {
      image: '/images/birthday_2.jpg',
      thumb: '/images/thumbs/birthday_2.jpg',
      title: 'Seattle, WA'
    },
    {
      image: '/images/halloween.jpg',
      thumb: '/images/thumbs/halloween.jpg',
      title: 'San Francisco, CA'
    },
    {
      image: '/images/point_reyes_1.jpg',
      thumb: '/images/thumbs/point_reyes_1.jpg',
      title: 'Point Reyes National Seashore, CA'
    },
    {
      image: '/images/banff_3.jpg',
      thumb: '/images/thumbs/banff_3.jpg',
      title: 'Banff National Park, Canada'
    },
    {
      image: '/images/alzheimers_walk.jpg',
      thumb: '/images/thumbs/alzheimers_walk.jpg',
      title: 'San Francisco, CA'
    },
    {
      image: '/images/rio.jpg',
      thumb: '/images/thumbs/rio.jpg',
      title: 'Rio de Janeiro, Brazil'
    },
    {
      image: '/images/victoria_clipper.jpg',
      thumb: '/images/thumbs/victoria_clipper.jpg',
      title: 'Victoria Clipper'
    },
    {
      image: '/images/salkantay_2.jpg',
      thumb: '/images/thumbs/salkantay_2.jpg',
      title: 'Salkantay Trek, Peru'
    },
    {
      image: '/images/uyuni_2.jpg',
      thumb: '/images/thumbs/uyuni_2.jpg',
      title: 'Salar de Uyuni, Bolivia'
    },
    {
      image: '/images/valparaiso.jpg',
      thumb: '/images/thumbs/valparaiso.jpg',
      title: 'Valparaiso, Chile'
    },
    {
      image: '/images/space_needle.jpg',
      thumb: '/images/thumbs/space_needle.jpg',
      title: 'Seattle, WA'
    },
    {
      image: '/images/capitol_hill_2.jpg',
      thumb: '/images/thumbs/capitol_hill_2.jpg',
      title: 'Seattle, WA'
    },
    {
      image: '/images/machu_picchu_1.jpg',
      thumb: '/images/thumbs/machu_picchu_1.jpg',
      title: 'Machu Picchu, Peru'
    },
    {
      image: '/images/half_dome.jpg',
      thumb: '/images/thumbs/half_dome.jpg',
      title: 'Half Dome, Yosemite National Park, CA'
    },
    {
      image: '/images/bbq.jpg',
      thumb: '/images/thumbs/bbq.jpg',
      title: 'Seattle, WA'
    },
    {
      image: '/images/machu_picchu_3.jpg',
      thumb: '/images/thumbs/machu_picchu_3.jpg',
      title: 'Machu Picchu, Peru'
    },
    {
      image: '/images/basketball.jpg',
      thumb: '/images/thumbs/basketball.jpg',
      title: 'Seattle, WA'
    },
    {
      image: '/images/outside_lands.jpg',
      thumb: '/images/thumbs/outside_lands.jpg',
      title: 'San Francisco, CA'
    },
    {
      image: '/images/death_road.jpg',
      thumb: '/images/thumbs/death_road.jpg',
      title: 'Death Road, Bolivia'
    },
    {
      image: '/images/capitol_hill_1.jpg',
      thumb: '/images/thumbs/capitol_hill_1.jpg',
      title: 'Seattle, WA'
    },
    {
      image: '/images/quito.jpg',
      thumb: '/images/thumbs/quito.jpg',
      title: 'Quito, Ecuador'
    },
    {
      image: '/images/tulip_2.jpg',
      thumb: '/images/thumbs/tulip_2.jpg',
      title: 'Mount Vernon, WA'
    },
    {
      image: '/images/big_ben.jpg',
      thumb: '/images/thumbs/big_ben.jpg',
      title: 'London, United Kingdom'
    },
    {
      image: '/images/whitney.jpg',
      thumb: '/images/thumbs/whitney.jpg',
      title: 'Mt. Whitney, CA'
    }
  ];

  Galleria.loadTheme('/scripts/galleria.classic.min.js');
  Galleria.configure({
    dataSource: images
  });
  Galleria.run('#galleria');
</script>
<?php
footer();
?>
