USE bharatpur_explore_ai;
INSERT IGNORE INTO categories(name,icon) VALUES
('Nature','leaf'),('Wildlife','paw'),('Culture','landmark'),('Food','utensils'),('Adventure','person-hiking'),('Photography','camera'),('Family','people-roof'),('Local Experiences','people-group');

INSERT INTO places(name,category,location,description,rating,estimated_cost,lat,lng,is_demo) VALUES
('Narayani Riverfront','Nature','Narayani riverside, Bharatpur','Demo tourism entry for sunset, walking and riverside relaxation.',4.7,300,27.6816000,84.4277000,1),
('Bishazari Tal (Twenty Thousand Lake)','Wildlife','Bharatpur–Chitwan area','Demo nature entry for birdwatching and wetland exploration.',4.6,700,27.6172000,84.4387000,1),
('Devghat Cultural & Riverside Area','Culture','Devghat area','Demo cultural and riverside tourism entry.',4.5,450,27.7149000,84.4184000,1);

INSERT INTO restaurants(name,category,location,description,rating,price_level,is_demo) VALUES
('Local Thali Tasting (Demo)','Food','Central Bharatpur','Prototype restaurant/food-experience entry.',4.6,650,1);
INSERT INTO homestays(name,location,description,rating,price_per_night,is_demo) VALUES
('Community Homestay Evening (Demo)','Western Chitwan','Prototype community accommodation entry.',4.7,2200,1);
INSERT INTO events(name,event_type,event_date,location,description,is_demo) VALUES
('Bharatpur Local Food Weekend (Demo)','Food','2026-10-10','Central Bharatpur','Prototype event only; not an official event listing.',1);
