# TflUnified

TflUnified is a package for Laravel that simplifies interacting with the Transport for London (TfL) Unified API.

See: [TfL API](https://api.tfl.gov.uk/)

## Installation

### Step 1: Composer

```
composer require abulia/tfl-unified
```

### Step 2: Service Provider

Within the Laravel app, open `config/app.php` and within the `providers` array, append:

```
Abulia\TflUnified\TflServiceProvider::class
```

**Optional Facade Alias**

Within the `aliases` array, append:

```
'Tfl' => Abulia\TflUnified\ApiServiceFacade::class
```

### Step 3: Configuration

The default configuration should work without modification. To customise the connection settings, run:

```
php artisan vendor:publish
```

This will copy `tfl.php` to `config/`. All connection options can be set in this file - it also shows the environment variables that can be set within the `.env` file.


## Usage Examples
(Shown as PsySH session)

**Get journey planner route**

```
>>> {
...     $ambiguousResult = Tfl::journey()
...         ->withDisambiguation()
...         ->journeyResults('Paddington', 'Brixton');
... 
...     $fromIcsCode = $ambiguousResult->getFromLocationDisambiguation() 
...         ->getDisambiguationOptions()[0] 
...         ->getPlace() 
...         ->getIcsCode();
... 
...     $toIcsCode = $ambiguousResult->getToLocationDisambiguation() 
...         ->getDisambiguationOptions()[0] 
...         ->getPlace() 
...         ->getIcsCode();
... 
...     $exactResult = Tfl::journey()
...         ->withDisambiguation()
...         ->journeyResults($fromIcsCode, $toIcsCode);
... 
...     foreach ($exactResult->getJourneys()[0]->getLegs() as $leg) {
...         echo($leg->getInstruction()->getDetailed() . "\n");
...     }
... }
Bakerloo line towards Elephant & Castle
Victoria line towards Brixton
>>> 
```

**Get bus arrival times for stop on line #2**

```
>>> {
...     $stopPoints = Tfl::cached(60)->line()->stopPoints(2);
... 
...     echo("StopPoint: " . $stopPoints[0]->getCommonName() . "\n");
... 
...     foreach (Tfl::stopPoint()->arrivals($stopPoints[0]->getId()) as $arrival) {
...         printf("Bus#: %3d\tDestination: %30s\tExpected: %s\n", $arrival->getLineName(), $arrival->getDestinationName(), $arrival->getExpectedArrival()->format('c'));
...     }
... }
StopPoint: Brixton Station
Bus#: 109	Destination:            Croydon Town Centre	Expected: 2017-06-16T15:22:46+00:00
Bus#: 109	Destination:            Croydon Town Centre	Expected: 2017-06-16T15:17:02+00:00
Bus#: 109	Destination:            Croydon Town Centre	Expected: 2017-06-16T15:11:10+00:00
Bus#: 109	Destination:            Croydon Town Centre	Expected: 2017-06-16T15:11:39+00:00
Bus#: 109	Destination:            Croydon Town Centre	Expected: 2017-06-16T15:06:06+00:00
Bus#: 109	Destination:            Croydon Town Centre	Expected: 2017-06-16T15:05:50+00:00
Bus#: 133	Destination:              Streatham Station	Expected: 2017-06-16T15:23:02+00:00
Bus#: 133	Destination:              Streatham Station	Expected: 2017-06-16T15:08:40+00:00
Bus#: 133	Destination:              Streatham Station	Expected: 2017-06-16T15:13:29+00:00
Bus#: 133	Destination:              Streatham Station	Expected: 2017-06-16T15:29:01+00:00
Bus#: 133	Destination:              Streatham Station	Expected: 2017-06-16T15:02:58+00:00
Bus#: 159	Destination:              Streatham Station	Expected: 2017-06-16T15:30:19+00:00
Bus#: 159	Destination:              Streatham Station	Expected: 2017-06-16T15:19:25+00:00
Bus#: 159	Destination:              Streatham Station	Expected: 2017-06-16T15:11:53+00:00
Bus#: 159	Destination:              Streatham Station	Expected: 2017-06-16T15:14:51+00:00
Bus#: 159	Destination:              Streatham Station	Expected: 2017-06-16T15:03:33+00:00
Bus#: 159	Destination:              Streatham Station	Expected: 2017-06-16T15:10:02+00:00
Bus#:   2	Destination:                   West Norwood	Expected: 2017-06-16T15:15:15+00:00
Bus#:   2	Destination:                   West Norwood	Expected: 2017-06-16T15:20:39+00:00
Bus#:   2	Destination:                   West Norwood	Expected: 2017-06-16T15:26:56+00:00
Bus#:   2	Destination:                   West Norwood	Expected: 2017-06-16T15:09:00+00:00
Bus#:   2	Destination:                   West Norwood	Expected: 2017-06-16T15:11:24+00:00
Bus#: 250	Destination:            Croydon Town Centre	Expected: 2017-06-16T15:14:59+00:00
Bus#: 250	Destination:            Croydon Town Centre	Expected: 2017-06-16T15:13:33+00:00
Bus#: 250	Destination:            Croydon Town Centre	Expected: 2017-06-16T15:28:45+00:00
Bus#: 250	Destination:            Croydon Town Centre	Expected: 2017-06-16T15:22:44+00:00
Bus#: 250	Destination:            Croydon Town Centre	Expected: 2017-06-16T15:06:04+00:00
Bus#: 333	Destination:               Tooting Broadway	Expected: 2017-06-16T15:26:11+00:00
Bus#: 333	Destination:               Tooting Broadway	Expected: 2017-06-16T15:03:34+00:00
Bus#: 333	Destination:               Tooting Broadway	Expected: 2017-06-16T15:17:07+00:00
Bus#:  45	Destination:                        Brixton	Expected: 2017-06-16T15:04:58+00:00
Bus#:  45	Destination:                   Clapham Park	Expected: 2017-06-16T15:09:48+00:00
Bus#:  45	Destination:                   Clapham Park	Expected: 2017-06-16T15:11:11+00:00
Bus#:  45	Destination:                   Clapham Park	Expected: 2017-06-16T15:31:57+00:00
Bus#:  45	Destination:                   Clapham Park	Expected: 2017-06-16T15:29:57+00:00
Bus#:  59	Destination: Streatham Hill, Telford Avenue	Expected: 2017-06-16T15:04:52+00:00
Bus#:  59	Destination: Streatham Hill, Telford Avenue	Expected: 2017-06-16T15:09:08+00:00
Bus#:  59	Destination: Streatham Hill, Telford Avenue	Expected: 2017-06-16T15:21:00+00:00
Bus#:  59	Destination: Streatham Hill, Telford Avenue	Expected: 2017-06-16T15:13:42+00:00
Bus#:  59	Destination: Streatham Hill, Telford Avenue	Expected: 2017-06-16T15:15:35+00:00
>>>
```

## Logging

```
Tfl::setLogger(Log $logger)  
```
To set a logger instance for API call exceptions.

## Caching

Results are not cached by default. Any result set can be easily cached, using the Laravel default cache, by calling:
 
```
Tfl::cached(5)->line()->arrivals('490000031T', '2')
```
This will cached arrivals data for 5 minutes.

To use a different caching instance:
```
Tfl::setCache(Cache $cache)  
```
To clear all cached data:
```
Tfl::clearCache()  
```

Cache tags will be used if supported by the cache backend.

## API

**AccidentStats**  

`Tfl::accidentStats()->get($year)`  
Gets all accident details for accidents occurring in the specified year.

**AirQuality**  

`Tfl::airQuality()->get()`  
Gets air quality data feed.

**BikePoint**  

`Tfl::bikePoint()->get($id)`  
Gets the bike point with the given id.

`Tfl::bikePoint()->getAll()`  
Gets all bike point locations. The Place object has an addtionalProperties array which contains the nbBikes, nbDocks and nbSpaces numbers which give the status of the BikePoint. A mismatch in these numbers i.e. nbDocks - (nbBikes + nbSpaces) != 0 indicates broken docks.

`Tfl::bikePoint()->search($query)`  
Search for bike stations by their name, a bike point's name often contains information about the name of the street or nearby landmarks, for example. Note that the search result does not contain the PlaceProperties i.e. the status or occupancy of the BikePoint, to get that information you should retrieve the BikePoint by its id on /BikePoint/id.

**Cabwise**  

`Tfl::cabwise()->get($lat, $lon, $optype = null, $wc = null, $radius = null, $name = null, $max_results = null, $legacy_format = null, $force_xml = null, $twenty_four_seven_only = null)`  
Gets taxis and minicabs contact information.

**Journey**  

`Tfl::journey()->meta()`  
Gets a list of all of the available journey planner modes.

`Tfl::journey()->journeyResults($from, $to, $via = null, $national_search = null, $date = null, $time = null, $time_is = null, $journey_preference = null, $mode = null, $accessibility_preference = null, $from_name = null, $to_name = null, $via_name = null, $max_transfer_minutes = null, $max_walking_minutes = null, $walking_speed = null, $cycle_preference = null, $adjustment = null, $bike_proficiency = null, $alternative_cycle = null, $alternative_walking = null, $apply_html_markup = null, $use_multi_modal_call = null, $walking_optimization = null)`  
Perform a Journey Planner search from the parameters specified in simple types.

`Tfl::journey()->withDisambiguation()->journeyResults($from, $to, $via = null, $national_search = null, $date = null, $time = null, $time_is = null, $journey_preference = null, $mode = null, $accessibility_preference = null, $from_name = null, $to_name = null, $via_name = null, $max_transfer_minutes = null, $max_walking_minutes = null, $walking_speed = null, $cycle_preference = null, $adjustment = null, $bike_proficiency = null, $alternative_cycle = null, $alternative_walking = null, $apply_html_markup = null, $use_multi_modal_call = null, $walking_optimization = null)`  
Perform a Journey Planner search & handle disambiguating ambiguous searches.

**Line**  

`Tfl::line()->arrivals($stop_point_id, $ids)`  
Get the list of arrival predictions for given line ids based at the given stop.

`Tfl::line()->arrivalsByStopPoint($stop_point_id, $ids, $direction)`  
Get the list of arrival predictions for given line ids based at the given stop going in the provided direction.

`Tfl::line()->disruption($ids)`  
Get disruptions for the given line ids.

`Tfl::line()->disruptionByMode($modes)`  
Get disruptions for all lines of the given modes.

`Tfl::line()->get($ids)`  
Gets line specified by the line id.

`Tfl::line()->getByMode($modes)`  
Gets line specified by provided modes.

`Tfl::line()->lineRoutesByIds($ids, $service_types = null)`  
Get all valid routes for given line ids, including the name and id of the originating and terminating stops for each route.

`Tfl::line()->metaDisruptionCategories()`  
Gets a list of valid categories to filter disruptions.

`Tfl::line()->metaModes()`  
Gets a list of all of the valid modes to filter lines by.

`Tfl::line()->metaServiceTypes()`  
Gets a list of valid ServiceTypes to filter on.

`Tfl::line()->metaSeverity()`  
Gets a list of valid severity codes.

`Tfl::line()->routeByMode($modes, $service_types = null)`  
Gets all lines and their valid routes for given modes, including the name and id of the originating and terminating stops for each route.

`Tfl::line()->routeSequence($id, $direction, $service_types = null, $exclude_crowding = null)`  
Gets all valid routes for given line id, including the sequence of stops on each route.

`Tfl::line()->search($query, $modes = null, $service_types = null)`  
Search for lines or routes matching the query string.

`Tfl::line()->status($ids, $start_date, $end_date, $detail = null, $date_range_start_date = null, $date_range_end_date = null)`  
Gets the line status for given line ids during the provided dates e.g Minor Delays.

`Tfl::line()->statusByIds($ids, $detail = null)`  
Gets the line status of for given line ids e.g Minor Delays.

`Tfl::line()->statusByMode($modes, $detail = null)`  
Gets the line status of for all lines for the given modes.

`Tfl::line()->statusBySeverity($severity)`  
Gets the line status for all lines with a given severity A list of valid severity codes can be obtained from a call to Line/Meta/Severity.

`Tfl::line()->stopPoints($id)`  
Gets a list of the stations that serve the given line id.

`Tfl::line()->timetable($from_stop_point_id, $id)`  
Gets the timetable for a specified station on the give line.

`Tfl::line()->timetableTo($from_stop_point_id, $id, $to_stop_point_id)`  
Gets the timetable for a specified station on the give line with specified destination.

**Mode**  

`Tfl::mode()->arrivals($mode, $count = null)`  
Gets the next arrival predictions for all stops of a given mode.

`Tfl::mode()->getActiveServiceTypes()`  
Returns the service type active for a mode. Currently only supports tube.

**Occupancy**  

`Tfl::occupancy()->get()`  
Gets the occupancy for all car parks that have occupancy data.

`Tfl::occupancy()->getById($id)`  
Gets the occupancy for a car park with a given id.

**Place**  

`Tfl::place()->get($id, $include_children = null)`  
Gets the place with the given id.

`Tfl::place()->getAt($type, $lat, $lon, $location_lat, $location_lon)`  
Gets any places of the given type whose geography intersects the given latitude and longitude. In practice this means the Place must be polygonal e.g. a BoroughBoundary.

`Tfl::place()->getByGeoBox($sw_lat, $sw_lon, $ne_lat, $ne_lon, $categories = null, $include_children = null, $type = null, $active_only = null)`  
Gets the places that lie within the bounding box defined by the lat/lon of its north-west and south-east corners. Optionally filters on type and can strip properties for a smaller payload.

`Tfl::place()->getByType($types, $active_only = null)`  
Gets all places of a given type.

`Tfl::place()->getOverlay($z, $type, $width, $height, $lat, $lon, $location_lat, $location_lon)`  
Gets the place overlay for a given set of co-ordinates and a given width/height.

`Tfl::place()->getStreetsByPostCode($postcode, $postcode_input_postcode = null)`  
Gets the set of streets associated with a post code.

`Tfl::place()->metaCategories()`  
Gets a list of all of the available place property categories and keys.

`Tfl::place()->metaPlaceTypes()`  
Gets a list of the available types of Place.

`Tfl::place()->search($name, $types = null)`  
Gets all places that matches the given query.

**Road**  

`Tfl::road()->disruptedStreets($start_date, $end_date)`  
Gets a list of disrupted streets. If no date filters are provided, current disruptions are returned.

`Tfl::road()->disruption($ids, $strip_content = null, $severities = null, $categories = null, $closures = null)`  
Get active disruptions, filtered by road ids.

`Tfl::road()->disruptionById($disruption_ids, $strip_content = null)`  
Gets a list of active disruptions filtered by disruption Ids.

`Tfl::road()->get()`  
Gets all roads managed by TfL.

`Tfl::road()->getById($ids)`  
Gets the road with the specified id (e.g. A1).

`Tfl::road()->metaCategories()`  
Gets a list of valid RoadDisruption categories.

`Tfl::road()->metaSeverities()`  
Gets a list of valid RoadDisruption severity codes.

`Tfl::road()->status($ids, $date_range_nullable_start_date = null, $date_range_nullable_end_date = null)`  
Gets the specified roads with the status aggregated over the date range specified, or now until the end of today if no dates are passed.

**Search**  

`Tfl::search()->busSchedules($query)`  
Searches the bus schedules folder on S3 for a given bus number.

`Tfl::search()->get($query)`  
Search the site for occurrences of the query string. The maximum number of results returned is equal to the maximum page size of 100. To return subsequent pages, use the paginated overload.

`Tfl::search()->metaCategories()`  
Gets the available search categories.

`Tfl::search()->metaSearchProviders()`  
Gets the available searchProvider names.

`Tfl::search()->metaSorts()`  
Gets the available sorting options.

**StopPoint**  

`Tfl::stopPoint()->crowding($id, $line, $direction)`  
Gets all the Crowding data (static) for the StopPointId, plus crowding data for a given line and optionally a particular direction.

`Tfl::stopPoint()->arrivals($id)`  
Gets the list of arrival predictions for the given stop point id.

`Tfl::stopPoint()->direction($id, $to_stop_point_id, $line_id = null)`  
Returns the canonical direction, \"inbound\" or \"outbound\", for a given pair of stop point Ids in the direction from -&gt; to.

`Tfl::stopPoint()->disruption($ids, $get_family = null, $include_route_blocked_stops = null, $flatten_response = null)`  
Gets all disruptions for the specified StopPointId, plus disruptions for any child Naptan records it may have.

`Tfl::stopPoint()->disruptionByMode($modes, $include_route_blocked_stops = null)`  
Gets a distinct list of disrupted stop points for the given modes.

`Tfl::stopPoint()->get($ids, $include_crowding_data = null)`  
Gets a list of StopPoints corresponding to the given list of stop ids.

`Tfl::stopPoint()->getByGeoPoint($stop_types, $lat, $lon, $radius = null, $use_stop_point_hierarchy = null, $modes = null, $categories = null, $return_lines = null)`  
Gets a list of StopPoints within {radius} by the specified criteria.

`Tfl::stopPoint()->getByMode($modes, $page = null)`  
Gets a list of StopPoints filtered by the modes available at that StopPoint.

`Tfl::stopPoint()->getBySms($id, $output = null)`  
Gets a StopPoint for a given sms code.

`Tfl::stopPoint()->getByType($types)`  
Gets all stop points of a given type.

`Tfl::stopPoint()->getCarParksById($stop_point_id)`  
Get car parks corresponding to the given stop point id.

`Tfl::stopPoint()->getServiceTypes($id, $line_ids = null, $modes = null)`  
Gets the service types for a given stoppoint.

`Tfl::stopPoint()->getTaxiRanksByIds($stop_point_id)`  
Gets a list of taxi ranks corresponding to the given stop point id.

`Tfl::stopPoint()->metaCategories()`  
Gets the list of available StopPoint additional information categories.

`Tfl::stopPoint()->metaModes()`  
Gets the list of available StopPoint modes.

`Tfl::stopPoint()->metaStopTypes()`  
Gets the list of available StopPoint types.

`Tfl::stopPoint()->reachableFrom($id, $line_id, $service_types = null)`  
Gets Stopoints that are reachable from a station/line combination.

`Tfl::stopPoint()->route($id, $service_types = null)`  
Returns the route sections for all the lines that service the given stop point ids.

`Tfl::stopPoint()->search($query, $modes = null, $fares_only = null, $max_results = null, $lines = null, $include_hubs = null)`  
Search StopPoints by their common name, or their 5-digit Countdown Bus Stop Code.

`Tfl::stopPoint()->searchByQuery($query, $modes = null, $fares_only = null, $max_results = null, $lines = null, $include_hubs = null)`  
Search StopPoints by their common name, or their 5-digit Countdown Bus Stop Code.

**TravelTime**  

`Tfl::travelTime()->getCompareOverlay($z, $pin_lat, $pin_lon, $map_center_lat, $map_center_lon, $scenario_title, $time_of_day_id, $mode_id, $width, $height, $direction, $travel_time_interval, $compare_type, $compare_value)`  
Gets the TravelTime overlay.

`Tfl::travelTime()->getOverlay($z, $pin_lat, $pin_lon, $map_center_lat, $map_center_lon, $scenario_title, $time_of_day_id, $mode_id, $width, $height, $direction, $travel_time_interval)`  
Gets the TravelTime overlay.

**Vehicle**  

`Tfl::vehicle()->get($ids)`  
Gets the predictions for a given list of vehicle Id's.

`Tfl::vehicle()->getVehicle($vrm)`  
Gets the Emissions Surcharge compliance for the Vehicle.



