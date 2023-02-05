in ``.env.local`` replace `root` by your username to connect to mysql

### Import data from api :
`php bin/console data:import --entity=[entity]`

replace `[entity]` by one of the following :
- starships 
- films
- people
- planets
- species
- vehicles

### show dashboard
``http://127.0.0.1:8000/admin``





