CREATE DATABASE  IF NOT EXISTS `chicheng` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `chicheng`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: chicheng
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.19-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=214 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (197,'Auto & Transport'),(198,'Bills &amp; Utilities'),(199,'Utilities'),(200,'Education'),(201,'Entertainment & Hobbies'),(202,'Fees & Charges'),(203,'Financial'),(204,'Food & Dining'),(205,'Gifts & Donations'),(206,'Health & Fitness'),(207,'Home'),(208,'Kids'),(209,'Personal Care'),(210,'Pets'),(211,'Shopping'),(212,'Tax'),(213,'Travel');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keywords_by_category`
--

DROP TABLE IF EXISTS `keywords_by_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keywords_by_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(245) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2411 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keywords_by_category`
--

LOCK TABLES `keywords_by_category` WRITE;
/*!40000 ALTER TABLE `keywords_by_category` DISABLE KEYS */;
INSERT INTO `keywords_by_category` VALUES (1812,'ATV Rentals/Tours\r\n      ',201),(1813,'Airsoft\r\n      ',201),(1814,'Amateur Sports Teams\r\n      ',201),(1815,'Amusement Parks\r\n      ',201),(1816,'Aquariums\r\n      ',201),(1817,'Archery\r\n      ',201),(1818,'Badminton\r\n      ',201),(1819,'Baseball Fields\r\n      ',201),(1820,'Basketball Courts\r\n      ',201),(1821,'Batting Cages\r\n      ',201),(1822,'Beach Equipment Rentals\r\n      ',201),(1823,'Beaches\r\n      ',201),(1824,'Bike Parking\r\n      ',201),(1825,'Bike Rentals\r\n      ',201),(1826,'Boating\r\n      ',201),(1827,'Bobsledding\r\n      ',201),(1828,'Bocce Ball\r\n      ',201),(1829,'Bowling\r\n      ',201),(1830,'Bubble Soccer\r\n      ',201),(1831,'Bungee Jumping\r\n      ',201),(1832,'Carousels\r\n      ',201),(1833,'Challenge Courses\r\n      ',201),(1834,'Climbing\r\n      ',201),(1835,'Cycling Classes\r\n      ',201),(1836,'Day Camps\r\n      ',201),(1837,'Disc Golf\r\n      ',201),(1838,'Diving\r\n      ',201),(1839,'Escape Games\r\n      ',201),(1840,'Fencing Clubs\r\n      ',201),(1841,'Fishing\r\n      ',201),(1842,'Fitness & Instruction\r\n      ',201),(1843,'Flyboarding\r\n      ',201),(1844,'Go Karts\r\n      ',201),(1845,'Golf\r\n      ',201),(1846,'Gun/Rifle Ranges\r\n      ',201),(1847,'Gymnastics\r\n      ',201),(1848,'Hang Gliding\r\n      ',201),(1849,'Hiking\r\n      ',201),(1850,'Horse Racing\r\n      ',201),(1851,'Horseback Riding\r\n      ',201),(1852,'Hot Air Balloons\r\n      ',201),(1853,'Indoor Playcentre\r\n      ',201),(1854,'Jet Skis\r\n      ',201),(1855,'Kids Activities\r\n      ',201),(1856,'Kiteboarding\r\n      ',201),(1857,'Lakes\r\n      ',201),(1858,'Laser Tag\r\n      ',201),(1859,'Mini Golf\r\n      ',201),(1860,'Mountain Biking\r\n      ',201),(1861,'Nudist\r\n      ',201),(1862,'Paddleboarding\r\n      ',201),(1863,'Paintball\r\n      ',201),(1864,'Parasailing\r\n      ',201),(1865,'Parks\r\n      ',201),(1866,'Playgrounds\r\n      ',201),(1867,'Races & Competitions\r\n      ',201),(1868,'Racing Experience\r\n      ',201),(1869,'Rafting/Kayaking\r\n      ',201),(1870,'Recreation Centers\r\n      ',201),(1871,'Rock Climbing\r\n      ',201),(1872,'Sailing\r\n      ',201),(1873,'Scavenger Hunts\r\n      ',201),(1874,'Scooter Rentals\r\n      ',201),(1875,'Senior Centers\r\n      ',201),(1876,'Skating Rinks\r\n      ',201),(1877,'Skydiving\r\n      ',201),(1878,'Sledding\r\n      ',201),(1879,'Snorkeling\r\n      ',201),(1880,'Soccer\r\n      ',201),(1881,'Sports Clubs\r\n      ',201),(1882,'Squash\r\n      ',201),(1883,'Summer Camps\r\n      ',201),(1884,'Surfing\r\n      ',201),(1885,'Swimming Pools\r\n      ',201),(1886,'Tennis\r\n      ',201),(1887,'Trampoline Parks\r\n      ',201),(1888,'Tubing\r\n      ',201),(1889,'Water Parks\r\n      ',201),(1890,'Wildlife Hunting Ranges\r\n      ',201),(1891,'Ziplining\r\n      ',201),(1892,'Zoos\r\n      ',201),(1893,'Zorbing\r\n      ',201),(1894,'Arcades\r\n      ',201),(1895,'Art Galleries\r\n      ',201),(1896,'Bingo Halls\r\n      ',201),(1897,'Botanical Gardens\r\n      ',201),(1898,'Cabaret\r\n      ',201),(1899,'Casinos\r\n      ',201),(1900,'Cinema\r\n      ',201),(1901,'Country Clubs\r\n      ',201),(1902,'Cultural Center\r\n      ',201),(1903,'Eatertainment\r\n      ',201),(1904,'Farms\r\n      ',201),(1905,'Festivals\r\n      ',201),(1906,'Haunted Houses\r\n      ',201),(1907,'Jazz & Blues\r\n      ',201),(1908,'LAN Centers\r\n      ',201),(1909,'Makerspaces\r\n      ',201),(1910,'Museums\r\n      ',201),(1911,'Music Venues\r\n      ',201),(1912,'Observatories\r\n      ',201),(1913,'Opera & Ballet\r\n      ',201),(1914,'Paint & Sip\r\n      ',201),(1915,'Performing Arts\r\n      ',201),(1916,'Planetarium\r\n      ',201),(1917,'Professional Sports Teams\r\n      ',201),(1918,'Race Tracks\r\n      ',201),(1919,'Rodeo\r\n      ',201),(1920,'Social Clubs\r\n      ',201),(1921,'Stadiums & Arenas\r\n      ',201),(1922,'Studio Taping\r\n      ',201),(1923,'Supernatural Readings\r\n      ',201),(1924,'Ticket Sales\r\n      ',201),(1925,'Virtual Reality Centers\r\n      ',201),(1926,'Wineries\r\n      ',201),(1927,'Aircraft Dealers\r\n      ',197),(1928,'Aircraft Repairs\r\n      ',197),(1929,'Auto Customization\r\n      ',197),(1930,'Auto Detailing\r\n      ',197),(1931,'Auto Glass Services\r\n      ',197),(1932,'Auto Loan Providers\r\n      ',197),(1933,'Auto Parts & Supplies\r\n      ',197),(1934,'Auto Repair\r\n      ',197),(1935,'Auto Security\r\n      ',197),(1936,'Auto Upholstery\r\n      ',197),(1937,'Boat Dealers\r\n      ',197),(1938,'Body Shops\r\n      ',197),(1939,'Car Auctions\r\n      ',197),(1940,'Car Brokers\r\n      ',197),(1941,'Car Buyers\r\n      ',197),(1942,'Car Dealers\r\n      ',197),(1943,'Car Inspectors\r\n      ',197),(1944,'Car Share Services\r\n      ',197),(1945,'Car Stereo Installation\r\n      ',197),(1946,'Car Wash\r\n      ',197),(1947,'Commercial Truck Dealers\r\n      ',197),(1948,'Commercial Truck Repair\r\n      ',197),(1949,'EV Charging Stations\r\n      ',197),(1950,'Fuel Docks\r\n      ',197),(1951,'Gas Stations\r\n      ',197),(1952,'Golf Cart Dealers\r\n      ',197),(1953,'Hybrid Car Repair\r\n      ',197),(1954,'Interlock Systems\r\n      ',197),(1955,'Marinas\r\n      ',197),(1956,'Mobile Dent Repair\r\n      ',197),(1957,'Mobility Equipment Sales & Services\r\n      ',197),(1958,'Motorcycle Dealers\r\n      ',197),(1959,'Motorcycle Repair\r\n      ',197),(1960,'Motorsport Vehicle Dealers\r\n      ',197),(1961,'Motorsport Vehicle Repairs\r\n      ',197),(1962,'Oil Change Stations\r\n      ',197),(1963,'Parking\r\n      ',197),(1964,'RV Dealers\r\n      ',197),(1965,'RV Repair\r\n      ',197),(1966,'Registration Services\r\n      ',197),(1967,'Roadside Assistance\r\n      ',197),(1968,'Service Stations\r\n      ',197),(1969,'Smog Check Stations\r\n      ',197),(1970,'Tires\r\n      ',197),(1971,'Towing\r\n      ',197),(1972,'Trailer Dealers\r\n      ',197),(1973,'Trailer Rental\r\n      ',197),(1974,'Trailer Repair\r\n      ',197),(1975,'Transmission Repair\r\n      ',197),(1976,'Truck Rental\r\n      ',197),(1977,'Used Car Dealers\r\n      ',197),(1978,'Vehicle Shipping\r\n      ',197),(1979,'Vehicle Wraps\r\n      ',197),(1980,'Wheel & Rim Repair\r\n      ',197),(1981,'Windshield Installation & Repair\r\n      ',197),(1982,'Acne Treatment\r\n      ',206),(1983,'Barbers\r\n      ',206),(1984,'Cosmetics & Beauty Supply\r\n      ',206),(1985,'Day Spas\r\n      ',206),(1986,'Eyebrow Services\r\n      ',206),(1987,'Eyelash Service\r\n      ',206),(1988,'Hair Extensions\r\n      ',206),(1989,'Hair Loss Centers\r\n      ',206),(1990,'Hair Removal\r\n      ',206),(1991,'Hair Salons\r\n      ',206),(1992,'Hot Springs\r\n      ',206),(1993,'Makeup Artists\r\n      ',206),(1994,'Massage\r\n      ',206),(1995,'Medical Spas\r\n      ',206),(1996,'Nail Salons\r\n      ',206),(1997,'Perfume\r\n      ',206),(1998,'Permanent Makeup\r\n      ',206),(1999,'Piercing\r\n      ',206),(2000,'Skin Care\r\n      ',206),(2001,'Tanning\r\n      ',206),(2002,'Tattoo\r\n      ',206),(2003,'Teeth Whitening\r\n      ',206),(2004,'Adult Education\r\n      ',200),(2005,'Art Classes\r\n      ',200),(2006,'College Counseling\r\n      ',200),(2007,'Colleges & Universities\r\n      ',200),(2008,'Educational Services\r\n      ',200),(2009,'Elementary Schools\r\n      ',200),(2010,'Middle Schools & High Schools\r\n      ',200),(2011,'Montessori Schools\r\n      ',200),(2012,'Preschools\r\n      ',200),(2013,'Private Schools\r\n      ',200),(2014,'Private Tutors\r\n      ',200),(2015,'Religious Schools\r\n      ',200),(2016,'Special Education\r\n      ',200),(2017,'Specialty Schools\r\n      ',200),(2018,'Tasting Classes\r\n      ',200),(2019,'Test Preparation\r\n      ',200),(2020,'Tutoring Centers\r\n      ',200),(2021,'Waldorf Schools\r\n      ',200),(2022,'Acai Bowls\r\n      ',204),(2023,'Bagels\r\n      ',204),(2024,'Bakeries\r\n      ',204),(2025,'Beer',204),(2026,' Wine & Spirits\r\n      ',204),(2027,'Beverage Store\r\n      ',204),(2028,'Breweries\r\n      ',204),(2029,'Bubble Tea\r\n      ',204),(2030,'Butcher\r\n      ',204),(2031,'CSA\r\n      ',204),(2032,'Chimney Cakes\r\n      ',204),(2033,'Cideries\r\n      ',204),(2034,'Coffee & Tea\r\n      ',204),(2035,'Coffee Roasteries\r\n      ',204),(2036,'Convenience Stores\r\n      ',204),(2037,'Cupcakes\r\n      ',204),(2038,'Custom Cakes\r\n      ',204),(2039,'Desserts\r\n      ',204),(2040,'Distilleries\r\n      ',204),(2041,'Do-It-Yourself Food\r\n      ',204),(2042,'Donuts\r\n      ',204),(2043,'Empanadas\r\n      ',204),(2044,'Farmers Market\r\n      ',204),(2045,'Food Delivery Services\r\n      ',204),(2046,'Food Trucks\r\n      ',204),(2047,'Gelato\r\n      ',204),(2048,'Grocery\r\n      ',204),(2049,'Honey\r\n      ',204),(2050,'Ice Cream & Frozen Yogurt\r\n      ',204),(2051,'Imported Food\r\n      ',204),(2052,'International Grocery\r\n      ',204),(2053,'Internet Cafes\r\n      ',204),(2054,'Juice Bars & Smoothies\r\n      ',204),(2055,'Kombucha\r\n      ',204),(2056,'Organic Stores\r\n      ',204),(2057,'Patisserie/Cake Shop\r\n      ',204),(2058,'Piadina\r\n      ',204),(2059,'Poke\r\n      ',204),(2060,'Pretzels\r\n      ',204),(2061,'Shaved Ice\r\n      ',204),(2062,'Shaved Snow\r\n      ',204),(2063,'Smokehouse\r\n      ',204),(2064,'Specialty Food\r\n      ',204),(2065,'Street Vendors\r\n      ',204),(2066,'Tea Rooms\r\n      ',204),(2067,'Water Stores\r\n      ',204),(2068,'Wineries\r\n      ',204),(2069,'Acupuncture\r\n      ',206),(2070,'Alternative Medicine\r\n      ',206),(2071,'Animal Assisted Therapy\r\n      ',206),(2072,'Assisted Living Facilities\r\n      ',206),(2073,'Ayurveda\r\n      ',206),(2074,'Behavior Analysts\r\n      ',206),(2075,'Blood & Plasma Donation Centers\r\n      ',206),(2076,'Body Contouring\r\n      ',206),(2077,'Cannabis Clinics\r\n      ',206),(2078,'Cannabis Collective\r\n      ',206),(2079,'Chiropractors\r\n      ',206),(2080,'Colonics\r\n      ',206),(2081,'Concierge Medicine\r\n      ',206),(2082,'Counseling & Mental Health\r\n      ',206),(2083,'Cryotherapy\r\n      ',206),(2084,'Dental Hygienists\r\n      ',206),(2085,'Dentists\r\n      ',206),(2086,'Diagnostic Services\r\n      ',206),(2087,'Dialysis Clinics\r\n      ',206),(2088,'Dietitians\r\n      ',206),(2089,'Doctors\r\n      ',206),(2090,'Doulas\r\n      ',206),(2091,'Emergency Rooms\r\n      ',206),(2092,'Float Spa\r\n      ',206),(2093,'Habilitative Services\r\n      ',206),(2094,'Halfway Houses\r\n      ',206),(2095,'Halotherapy\r\n      ',206),(2096,'Health Coach\r\n      ',206),(2097,'Health Insurance Offices\r\n      ',206),(2098,'Hearing Aid Providers\r\n      ',206),(2099,'Herbal Shops\r\n      ',206),(2100,'Home Health Care\r\n      ',206),(2101,'Hospice\r\n      ',206),(2102,'Hospitals\r\n      ',206),(2103,'Hydrotherapy\r\n      ',206),(2104,'Hypnosis/Hypnotherapy\r\n      ',206),(2105,'IV Hydration\r\n      ',206),(2106,'Lactation Services\r\n      ',206),(2107,'Laser Eye Surgery/Lasik\r\n      ',206),(2108,'Lice Services\r\n      ',206),(2109,'Massage Therapy\r\n      ',206),(2110,'Medical Cannabis Referrals\r\n      ',206),(2111,'Medical Centers\r\n      ',206),(2112,'Medical Spas\r\n      ',206),(2113,'Medical Transportation\r\n      ',206),(2114,'Midwives\r\n      ',206),(2115,'Nurse Practitioner\r\n      ',206),(2116,'Nutritionists\r\n      ',206),(2117,'Occupational Therapy\r\n      ',206),(2118,'Optometrists\r\n      ',206),(2119,'Organ & Tissue Donor Services\r\n      ',206),(2120,'Orthotics\r\n      ',206),(2121,'Oxygen Bars\r\n      ',206),(2122,'Personal Care Services\r\n      ',206),(2123,'Pharmacy\r\n      ',206),(2124,'Physical Therapy\r\n      ',206),(2125,'Placenta Encapsulations\r\n      ',206),(2126,'Prenatal/Perinatal Care\r\n      ',206),(2127,'Prosthetics\r\n      ',206),(2128,'Prosthodontists\r\n      ',206),(2129,'Reflexology\r\n      ',206),(2130,'Rehabilitation Center\r\n      ',206),(2131,'Reiki\r\n      ',206),(2132,'Retirement Homes\r\n      ',206),(2133,'Saunas\r\n      ',206),(2134,'Skilled Nursing\r\n      ',206),(2135,'Sleep Specialists\r\n      ',206),(2136,'Speech Therapists\r\n      ',206),(2137,'Sperm Clinic\r\n      ',206),(2138,'Traditional Chinese Medicine\r\n      ',206),(2139,'Urgent Care\r\n      ',206),(2140,'Weight Loss Centers\r\n      ',206),(2141,'Artificial Turf\r\n      ',207),(2142,'Building Supplies\r\n      ',207),(2143,'Cabinetry\r\n      ',207),(2144,'Carpenters\r\n      ',207),(2145,'Carpet Installation\r\n      ',207),(2146,'Carpeting\r\n      ',207),(2147,'Childproofing\r\n      ',207),(2148,'Chimney Sweeps\r\n      ',207),(2149,'Contractors\r\n      ',207),(2150,'Countertop Installation\r\n      ',207),(2151,'Damage Restoration\r\n      ',207),(2152,'Decks & Railing\r\n      ',207),(2153,'Demolition Services\r\n      ',207),(2154,'Door Sales/Installation\r\n      ',207),(2155,'Drywall Installation & Repair\r\n      ',207),(2156,'Electricians\r\n      ',207),(2157,'Excavation Services\r\n      ',207),(2158,'Fences & Gates\r\n      ',207),(2159,'Fire Protection Services\r\n      ',207),(2160,'Fireplace Services\r\n      ',207),(2161,'Firewood\r\n      ',207),(2162,'Flooring\r\n      ',207),(2163,'Foundation Repair\r\n      ',207),(2164,'Furniture Assembly\r\n      ',207),(2165,'Garage Door Services\r\n      ',207),(2166,'Gardeners\r\n      ',207),(2167,'Glass & Mirrors\r\n      ',207),(2168,'Grout Services\r\n      ',207),(2169,'Gutter Services\r\n      ',207),(2170,'Handyman\r\n      ',207),(2171,'Heating & Air Conditioning/HVAC\r\n      ',207),(2172,'Holiday Decorating Services\r\n      ',207),(2173,'Home Automation\r\n      ',207),(2174,'Home Cleaning\r\n      ',207),(2175,'Home Energy Auditors\r\n      ',207),(2176,'Home Inspectors\r\n      ',207),(2177,'Home Network Installation\r\n      ',207),(2178,'Home Organization\r\n      ',207),(2179,'Home Theatre Installation\r\n      ',207),(2180,'Home Window Tinting\r\n      ',207),(2181,'House Sitters\r\n      ',207),(2182,'Insulation Installation\r\n      ',207),(2183,'Interior Design\r\n      ',207),(2184,'Internet Service Providers\r\n      ',207),(2185,'Irrigation\r\n      ',207),(2186,'Keys & Locksmiths\r\n      ',207),(2187,'Landscape Architects\r\n      ',207),(2188,'Landscaping\r\n      ',207),(2189,'Lighting Fixtures & Equipment\r\n      ',207),(2190,'Masonry/Concrete\r\n      ',207),(2191,'Mobile Home Repair\r\n      ',207),(2192,'Movers\r\n      ',207),(2193,'Packing Services\r\n      ',207),(2194,'Painters\r\n      ',207),(2195,'Patio Coverings\r\n      ',207),(2196,'Plumbing\r\n      ',207),(2197,'Pool & Hot Tub Service\r\n      ',207),(2198,'Pool Cleaners\r\n      ',207),(2199,'Pressure Washers\r\n      ',207),(2200,'Real Estate\r\n      ',207),(2201,'Refinishing Services\r\n      ',207),(2202,'Roof Inspectors\r\n      ',207),(2203,'Roofing\r\n      ',207),(2204,'Security Systems\r\n      ',207),(2205,'Shades & Blinds\r\n      ',207),(2206,'Shutters\r\n      ',207),(2207,'Siding\r\n      ',207),(2208,'Solar Installation\r\n      ',207),(2209,'Solar Panel Cleaning\r\n      ',207),(2210,'Structural Engineers\r\n      ',207),(2211,'Stucco Services\r\n      ',207),(2212,'Television Service Providers\r\n      ',207),(2213,'Tiling\r\n      ',207),(2214,'Tree Services\r\n      ',207),(2215,'Utilities\r\n      ',207),(2216,'Wallpapering\r\n      ',207),(2217,'Water Heater Installation/Repair\r\n      ',207),(2218,'Water Purification Services\r\n      ',207),(2219,'Waterproofing\r\n      ',207),(2220,'Window Washing\r\n      ',207),(2221,'Windows Installation\r\n      ',207),(2222,'Airports\r\n      ',201),(2223,'Bed & Breakfast\r\n      ',201),(2224,'Campgrounds\r\n      ',201),(2225,'Car Rental\r\n      ',201),(2226,'Guest Houses\r\n      ',201),(2227,'Health Retreats\r\n      ',201),(2228,'Hostels\r\n      ',201),(2229,'Hotels\r\n      ',201),(2230,'Motorcycle Rental\r\n      ',201),(2231,'RV Parks\r\n      ',201),(2232,'RV Rental\r\n      ',201),(2233,'Resorts\r\n      ',201),(2234,'Ski Resorts\r\n      ',201),(2235,'Tours\r\n      ',201),(2236,'Train Stations\r\n      ',201),(2237,'Transportation\r\n      ',201),(2238,'Travel Services\r\n      ',201),(2239,'Vacation Rental Agents\r\n      ',201),(2240,'Vacation Rentals\r\n      ',201),(2241,'3D Printing\r\n      (3dprinting)',209),(2242,'Adoption Services\r\n      ',209),(2243,'Air Duct Cleaning\r\n      ',209),(2244,'Appliances & Repair\r\n      ',209),(2245,'Appraisal Services\r\n      ',209),(2246,'Art Restoration\r\n      ',209),(2247,'Awnings\r\n      ',209),(2248,'Bail Bondsmen\r\n      ',209),(2249,'Bike Repair/Maintenance\r\n      ',209),(2250,'Bookbinding\r\n      ',209),(2251,'Bus Rental\r\n      ',209),(2252,'Calligraphy\r\n      ',209),(2253,'Carpet Cleaning\r\n      ',209),(2254,'Carpet Dyeing\r\n      ',209),(2255,'Child Care & Day Care\r\n      ',209),(2256,'Clock Repair\r\n      ',209),(2257,'Community Book Box\r\n      ',209),(2258,'Community Gardens\r\n      ',209),(2259,'Community Service/Non-Profit\r\n      ',209),(2260,'Couriers & Delivery Services\r\n      ',209),(2261,'Crane Services\r\n      ',209),(2262,'Donation Center\r\n      ',209),(2263,'Elder Care Planning\r\n      ',209),(2264,'Electronics Repair\r\n      ',209),(2265,'Engraving\r\n      ',209),(2266,'Environmental Abatement\r\n      ',209),(2267,'Environmental Testing\r\n      ',209),(2268,'Farm Equipment Repair\r\n      ',209),(2269,'Fingerprinting\r\n      ',209),(2270,'Funeral Services & Cemeteries\r\n      ',209),(2271,'Furniture Rental\r\n      ',209),(2272,'Furniture Repair\r\n      ',209),(2273,'Furniture Reupholstery\r\n      ',209),(2274,'Generator Installation/Repair\r\n      ',209),(2275,'Gunsmith\r\n      ',209),(2276,'Hazardous Waste Disposal\r\n      ',209),(2277,'Hydro-jetting\r\n      ',209),(2278,'IT Services & Computer Repair\r\n      ',209),(2279,'Ice Delivery\r\n      ',209),(2280,'Jewelry Repair\r\n      ',209),(2281,'Junk Removal & Hauling\r\n      ',209),(2282,'Junkyards\r\n      ',209),(2283,'Knife Sharpening\r\n      ',209),(2284,'Laundry Services\r\n      ',209),(2285,'Machine & Tool Rental\r\n      ',209),(2286,'Machine Shops\r\n      ',209),(2287,'Mailbox Centers\r\n      ',209),(2288,'Metal Fabricators\r\n      ',209),(2289,'Misting System Services\r\n      ',209),(2290,'Musical Instrument Services\r\n      ',209),(2291,'Nanny Services\r\n      ',209),(2292,'Notaries\r\n      ',209),(2293,'Pest Control\r\n      ',209),(2294,'Powder Coating\r\n      ',209),(2295,'Printing Services\r\n      ',209),(2296,'Propane\r\n      ',209),(2297,'Recording & Rehearsal Studios\r\n      ',209),(2298,'Recycling Center\r\n      ',209),(2299,'Sandblasting\r\n      ',209),(2300,'Screen Printing\r\n      ',209),(2301,'Screen Printing/T-Shirt Printing\r\n      ',209),(2302,'Self Storage\r\n      ',209),(2303,'Septic Services\r\n      ',209),(2304,'Sewing & Alterations\r\n      ',209),(2305,'Shipping Centers\r\n      ',209),(2306,'Shoe Repair\r\n      ',209),(2307,'Shoe Shine\r\n      ',209),(2308,'Snow Removal\r\n      ',209),(2309,'Snuggle Services\r\n      ',209),(2310,'TV Mounting\r\n      ',209),(2311,'Watch Repair\r\n      ',209),(2312,'Water Delivery\r\n      ',209),(2313,'Well Drilling\r\n      ',209),(2314,'Wildlife Control\r\n      ',209),(2315,'Adult Entertainment\r\n      ',201),(2316,'Bar Crawl\r\n      ',201),(2317,'Bars\r\n      ',201),(2318,'Beer Gardens\r\n      ',201),(2319,'Club Crawl\r\n      ',201),(2320,'Comedy Clubs\r\n      ',201),(2321,'Country Dance Halls\r\n      ',201),(2322,'Dance Clubs\r\n      ',201),(2323,'Jazz & Blues\r\n      ',201),(2324,'Karaoke\r\n      ',201),(2325,'Music Venues\r\n      ',201),(2326,'Piano Bars\r\n      ',201),(2327,'Pool Halls\r\n      ',201),(2328,'Animal Shelters\r\n      ',210),(2329,'Horse Boarding\r\n      ',210),(2330,'Pet Adoption\r\n      ',210),(2331,'Pet Services\r\n      ',210),(2332,'Pet Stores\r\n      ',210),(2333,'Veterinarians\r\n      ',210),(2334,'Adult\r\n      ',211),(2335,'Antiques\r\n      ',211),(2336,'Art Galleries\r\n      ',211),(2337,'Arts & Crafts\r\n      ',211),(2338,'Auction Houses\r\n      ',211),(2339,'Baby Gear & Furniture\r\n      ',211),(2340,'Battery Stores\r\n      ',211),(2341,'Bespoke Clothing\r\n      ',211),(2342,'Books',211),(2343,' Mags',211),(2344,' Music & Video\r\n      ',211),(2345,'Brewing Supplies\r\n      ',211),(2346,'Bridal\r\n      ',211),(2347,'Cannabis Dispensaries\r\n      ',211),(2348,'Computers\r\n      ',211),(2349,'Cosmetics & Beauty Supply\r\n      ',211),(2350,'Customized Merchandise\r\n      ',211),(2351,'Department Stores\r\n      ',211),(2352,'Discount Store\r\n      ',211),(2353,'Drugstores\r\n      ',211),(2354,'Duty-Free Shops\r\n      ',211),(2355,'Electronics\r\n      ',211),(2356,'Eyewear & Opticians\r\n      ',211),(2357,'Farming Equipment\r\n      ',211),(2358,'Fashion\r\n      ',211),(2359,'Fireworks\r\n      ',211),(2360,'Fitness/Exercise Equipment\r\n      ',211),(2361,'Flea Markets\r\n      ',211),(2362,'Flowers & Gifts\r\n      ',211),(2363,'Gold Buyers\r\n      ',211),(2364,'Guns & Ammo\r\n      ',211),(2365,'Head Shops\r\n      ',211),(2366,'High Fidelity Audio Equipment\r\n      ',211),(2367,'Hobby Shops\r\n      ',211),(2368,'Home & Garden\r\n      ',211),(2369,'Horse Equipment Shops\r\n      ',211),(2370,'Jewelry\r\n      ',211),(2371,'Knitting Supplies\r\n      ',211),(2372,'Livestock Feed & Supply\r\n      ',211),(2373,'Luggage\r\n      ',211),(2374,'Medical Supplies\r\n      ',211),(2375,'Military Surplus\r\n      ',211),(2376,'Mobile Phone Accessories\r\n      ',211),(2377,'Mobile Phones\r\n      ',211),(2378,'Motorcycle Gear\r\n      ',211),(2379,'Musical Instruments & Teachers\r\n      ',211),(2380,'Office Equipment\r\n      ',211),(2381,'Outlet Stores\r\n      ',211),(2382,'Packing Supplies\r\n      ',211),(2383,'Pawn Shops\r\n      ',211),(2384,'Perfume\r\n      ',211),(2385,'Personal Shopping\r\n      ',211),(2386,'Photography Stores & Services\r\n      ',211),(2387,'Pool & Billiards\r\n      ',211),(2388,'Pop-up Shops\r\n      ',211),(2389,'Props\r\n      ',211),(2390,'Public Markets\r\n      ',211),(2391,'Religious Items\r\n      ',211),(2392,'Safe Stores\r\n      ',211),(2393,'Safety Equipment\r\n      ',211),(2394,'Shopping Centers\r\n      ',211),(2395,'Souvenir Shops\r\n      ',211),(2396,'Spiritual Shop\r\n      ',211),(2397,'Sporting Goods\r\n      ',211),(2398,'Tabletop Games\r\n      ',211),(2399,'Teacher Supplies\r\n      ',211),(2400,'Thrift Stores\r\n      ',211),(2401,'Tobacco Shops\r\n      ',211),(2402,'Toy Stores\r\n      ',211),(2403,'Trophy Shops\r\n      ',211),(2404,'Uniforms\r\n      ',211),(2405,'Used Bookstore\r\n      ',211),(2406,'Vape Shops\r\n      ',211),(2407,'Vitamins & Supplements\r\n      ',211),(2408,'Watches\r\n      ',211),(2409,'Wholesale Stores\r\n      ',211),(2410,'Wigs\r\n      ',211);
/*!40000 ALTER TABLE `keywords_by_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keywords_by_subcategory`
--

DROP TABLE IF EXISTS `keywords_by_subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keywords_by_subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(245) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keywords_by_subcategory`
--

LOCK TABLES `keywords_by_subcategory` WRITE;
/*!40000 ALTER TABLE `keywords_by_subcategory` DISABLE KEYS */;
/*!40000 ALTER TABLE `keywords_by_subcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1032 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategory`
--

LOCK TABLES `subcategory` WRITE;
/*!40000 ALTER TABLE `subcategory` DISABLE KEYS */;
INSERT INTO `subcategory` VALUES (953,'Auto Insurance\r\n  ',197),(954,'Auto Payment\r\n  ',197),(955,'Car Wash\r\n  ',197),(956,'Gas &amp; Fuel\r\n  ',197),(957,'Parking\r\n  ',197),(958,'Public Transportation\r\n  ',197),(959,'Registration\r\n  ',197),(960,'Service &amp; Parts\r\n  ',197),(961,'Tolls\r\n  ',197),(962,'Credit Card Payment\r\n  ',198),(963,'Home Phone\r\n  ',198),(964,'Internet\r\n  ',198),(965,'Mobile Phone\r\n  ',198),(966,'Television\r\n  ',198),(967,'Water\r\n    ',199),(968,'Electricity\r\n    ',199),(969,'Gas\r\n    ',199),(970,'Garbage\r\n    ',199),(971,'Books &amp; Supplies\r\n  ',200),(972,'Student Loan\r\n  ',200),(973,'Tuition\r\n  ',200),(974,'Amusement\r\n  ',201),(975,'Arts\r\n  ',201),(976,'Movies &amp; DVDs\r\n  ',201),(977,'Music\r\n  ',201),(978,'Newspaper &amp; Magazines\r\n  ',201),(979,'ATM Fee\r\n  ',202),(980,'Bank Fee\r\n  ',202),(981,'Late Fee\r\n  ',202),(982,'Service Fee\r\n  ',202),(983,'Trade Commissions\r\n  ',202),(984,'Financial Advisor\r\n  ',203),(985,'Life Insurance\r\n  ',203),(986,'Alcohol &amp; Bars\r\n  ',204),(987,'Coffee Shops\r\n  ',204),(988,'Fast Food\r\n  ',204),(989,'Groceries\r\n  ',204),(990,'Restaurants\r\n  ',204),(991,'Charity\r\n  ',205),(992,'Gift\r\n  ',205),(993,'Dentist\r\n  ',206),(994,'Doctor\r\n  ',206),(995,'Eyecare\r\n  ',206),(996,'Gym\r\n  ',206),(997,'Pharmacy\r\n  ',206),(998,'Sports\r\n  ',206),(999,'Furnishings\r\n  ',207),(1000,'HOA Dues\r\n  ',207),(1001,'Home Improvement\r\n  ',207),(1002,'Home Insurance\r\n  ',207),(1003,'Home Services\r\n  ',207),(1004,'Home Supplies\r\n  ',207),(1005,'Lawn &amp; Garden\r\n  ',207),(1006,'Mortgage &amp; Rent\r\n  ',207),(1007,'Mortgage Interest\r\n  ',207),(1008,'Interest Exp\r\n  ',207),(1009,'IRA Contribution\r\n  ',207),(1010,'Allowance\r\n  ',208),(1011,'Baby Supplies\r\n  ',208),(1012,'Babysitter &amp; Daycare\r\n  ',208),(1013,'Kids Activities\r\n  ',208),(1014,'Toys\r\n  ',208),(1015,'Misc.\r\n  ',208),(1016,'Hair\r\n  ',209),(1017,'Laundry\r\n  ',209),(1018,'Spa &amp; Massage\r\n  ',209),(1019,'Pet Food &amp; Supplies\r\n  ',210),(1020,'Pet Grooming\r\n  ',210),(1021,'Vet\r\n  ',210),(1022,'Books\r\n  ',211),(1023,'Clothing\r\n  ',211),(1024,'Electronics &amp; Software\r\n  ',211),(1025,'Hobbies\r\n  ',211),(1026,'Sporting Goods\r\n  ',211),(1027,'Property\r\n  ',212),(1028,'Air Travel\r\n  ',213),(1029,'Hotel\r\n  ',213),(1030,'Rental Car &amp; Taxi\r\n  ',213),(1031,'Vacation\r\n  ',213);
/*!40000 ALTER TABLE `subcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_category`
--

DROP TABLE IF EXISTS `user_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=332 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_category`
--

LOCK TABLES `user_category` WRITE;
/*!40000 ALTER TABLE `user_category` DISABLE KEYS */;
INSERT INTO `user_category` VALUES (302,3,'2'),(303,3,'g'),(330,3,'dd'),(331,3,'asfasf');
/*!40000 ALTER TABLE `user_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_subcategory`
--

DROP TABLE IF EXISTS `user_subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1174 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_subcategory`
--

LOCK TABLES `user_subcategory` WRITE;
/*!40000 ALTER TABLE `user_subcategory` DISABLE KEYS */;
INSERT INTO `user_subcategory` VALUES (1077,3,'poke',NULL,301),(1079,3,'mcale',NULL,302),(1082,3,'yum',NULL,303),(1085,3,'ttt',NULL,316),(1086,3,'poke',NULL,319),(1087,3,'rr',NULL,320),(1145,3,'gggg',5,NULL),(1163,3,'poke',1,NULL),(1164,3,'kobe',NULL,303),(1165,3,'poke',1,NULL),(1166,3,'jj',1,NULL),(1167,3,'shaq',NULL,302),(1168,3,'effe',197,NULL),(1172,3,'wow',198,NULL),(1173,3,'feafasf',200,NULL);
/*!40000 ALTER TABLE `user_subcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_key` varchar(145) DEFAULT NULL,
  `username` varchar(145) DEFAULT NULL,
  `password` varchar(145) DEFAULT NULL,
  `first_name` varchar(145) DEFAULT NULL,
  `last_name` varchar(145) DEFAULT NULL,
  `email` varchar(145) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'e85c5cfe','asdf','4297f44b13955235245b2497399d7a93',NULL,NULL,NULL,NULL),(2,'6d8cd69a','123123','5f4dcc3b5aa765d61d8327deb882cf99',NULL,NULL,NULL,NULL),(3,'6c2312a1','1111','74b87337454200d4d33f80c4663dc5e5','ff','aa','gry2600@gmail.com','m'),(4,'87c567b7','1111','74b87337454200d4d33f80c4663dc5e5',NULL,NULL,NULL,NULL),(5,'83eb1fef','1111','74b87337454200d4d33f80c4663dc5e5',NULL,NULL,NULL,NULL),(6,'4c49dcfa','1111','74b87337454200d4d33f80c4663dc5e5',NULL,NULL,NULL,NULL),(7,'508f5621','1111','74b87337454200d4d33f80c4663dc5e5',NULL,NULL,NULL,NULL),(8,'3587e24f','gry260','bb47b8c918c5da97a6aa5f0d673ebb95',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_expense`
--

DROP TABLE IF EXISTS `users_expense`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `user_subcategory_id` int(11) DEFAULT NULL,
  `name` varchar(245) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `price` double DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  `comment` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_expense`
--

LOCK TABLES `users_expense` WRITE;
/*!40000 ALTER TABLE `users_expense` DISABLE KEYS */;
INSERT INTO `users_expense` VALUES (1,3,203,NULL,984,NULL,'hahaha2','0000-00-00',13.1342,'2017-09-27 00:34:36','            '),(2,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:08:31','            asdfasdf'),(3,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:09:13','            ddd'),(4,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:10:24','            asdfasdf'),(5,3,198,NULL,963,NULL,'','2015-06-12',13.12,'2017-09-26 03:10:37','            asdfasdfasdf'),(6,3,203,NULL,984,NULL,'','2015-06-12',13.12,'2017-09-26 03:53:36','asdf'),(7,3,198,NULL,963,NULL,'','2015-06-12',13.12,'2017-09-26 03:12:38','            asdfasdf'),(8,3,198,NULL,963,NULL,'','2015-06-12',13.12,'2017-09-26 03:12:39','            asdfasdf'),(9,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:12:51','            asdfasdf'),(10,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:12:51','            asdfasdf'),(11,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:13:43','            asdfasf'),(12,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:13:53','            asdfasf'),(13,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:13:54','            asdfasf'),(14,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:14:07','            asdfasf'),(15,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:14:07','            asdfasf'),(16,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:14:08','            asdfasf'),(17,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:14:25','            asdfasf'),(18,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:14:26','            asdfasf'),(19,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:14:26','            asdfasf'),(20,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:14:27','            asdfasf'),(21,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:14:27','            asdfasf'),(22,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:14:28','            asdfasf'),(23,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:14:38','            asdfasf'),(24,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:15:21','            asfasf'),(25,3,198,NULL,964,NULL,'','2015-06-12',13.12,'2017-09-26 03:16:05','            asdfasdf'),(26,3,198,NULL,963,NULL,'','2015-06-12',13.12,'2017-09-26 03:18:33','            asdf'),(27,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:19:30','            yyyy'),(28,3,197,NULL,953,NULL,'','2015-06-12',13.12,'2017-09-26 03:19:41','            hahaha'),(29,3,198,NULL,963,NULL,'','2015-06-12',13.12,'2017-09-26 03:20:30','            asdfasdf'),(30,3,198,NULL,963,NULL,'123','2015-06-12',13.12,'2017-09-26 03:21:27','            asdfasf'),(31,3,198,NULL,963,NULL,'123','2015-06-12',13.12,'2017-09-26 03:21:28','            asdfasf'),(32,3,198,NULL,963,NULL,'123','2015-06-12',13.12,'2017-09-26 03:21:29','            asdfasf'),(33,3,198,NULL,963,NULL,'123','2015-06-12',13.12,'2017-09-26 03:21:30','            asdfasf'),(34,3,198,NULL,963,NULL,'123','2015-06-12',13.12,'2017-09-26 03:21:31','            asdfasf'),(35,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:22:20','            asdfasdfasdf'),(36,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:25:58','            dfesfe'),(37,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:25:59','            dfesfe'),(38,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:26:09','            dfesfe'),(39,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:26:22','            af'),(40,3,199,NULL,968,NULL,'','2015-06-12',13.12,'2017-09-26 03:26:36','            asdfasf'),(41,3,199,NULL,968,NULL,'','2015-06-12',13.12,'2017-09-26 03:26:37','            asdfasf'),(42,3,197,NULL,954,NULL,'','2015-06-12',13.12,'2017-09-26 03:28:25','            asfasfasdf'),(43,3,197,NULL,954,NULL,'','2015-06-12',13.12,'2017-09-26 03:28:26','            asfasfasdf'),(44,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:29:19','            asfasf'),(45,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:29:20','            asfasf'),(46,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:29:35','        asdfasf    '),(47,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:29:35','        asdfasf    '),(48,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:29:36','        asdfasf    '),(49,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:29:36','        asdfasf    '),(50,3,199,NULL,968,NULL,'','2015-06-12',13.12,'2017-09-26 03:29:45','            asdfasdf'),(51,3,199,NULL,969,NULL,'','2015-06-12',13.12,'2017-09-26 03:30:01','            asfasf'),(52,3,199,NULL,969,NULL,'','2015-06-12',13.12,'2017-09-26 03:30:01','            asfasf'),(53,3,199,NULL,969,NULL,'','2015-06-12',13.12,'2017-09-26 03:30:02','            asfasf'),(54,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:30:35','            asfasdf'),(55,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:30:44','            asfasdf fgsdg'),(56,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:33:36','            asdfasdf'),(57,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:33:37','            asdfasdf'),(58,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:33:38','            asdfasdf'),(59,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:33:38','            asdfasdf'),(60,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:33:39','            asdfasdf'),(61,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:33:39','            asdfasdf'),(62,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:33:39','            asdfasdf'),(63,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:33:39','            asdfasdf'),(64,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:33:39','            asdfasdf'),(65,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:33:39','            asdfasdf'),(66,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:33:40','            asdfasdf'),(67,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:33:40','            asdfasdf'),(68,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:33:40','            asdfasdf'),(69,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:33:40','            asdfasdf'),(70,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:33:40','            asdfasdf'),(71,3,199,NULL,967,NULL,'','2015-06-12',13.12,'2017-09-26 03:33:41','            asdfasdf'),(72,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:34:23','            fes'),(73,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:34:47','            12'),(74,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:34:48','            12'),(75,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:35:45','            123'),(76,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:35:48','            123'),(77,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:37:55','            123123'),(78,3,198,NULL,962,NULL,'','2015-06-12',13.12,'2017-09-26 03:38:23','            12'),(79,3,197,NULL,954,NULL,'','2015-06-12',13.122,'2017-09-26 03:38:35','            ad'),(80,3,198,NULL,962,NULL,'','0000-00-00',0,'2017-09-26 03:54:40','            asdfasf');
/*!40000 ALTER TABLE `users_expense` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-26 16:25:14
