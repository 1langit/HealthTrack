# HealthTrack

Hospital Check-Up History API Consortium

## API Endpoints

> Pasien

| Method  | Endpoint         | Description         |
|---------|------------------|---------------------|
| GET     | /pasien          | Get all patient     |
| GET     | /pasien?id={id}  | Get 1 patient       |
| POST    | /pasien          | Insert patient      |
| POST    | /pasien?id={id}  | Update patient      |
| DELETE  | /pasien?id={id}  | Delete patient      |


> Riwayat


| Method  | Endpoint          | Description        |
|---------|-------------------|--------------------|
| GET     | /riwayat          | Get all riwayat    |
| GET     | /riwayat?id={id}  | Get 1 riwayat      |
| GET     | /riwayat?id_pasien={id}  | Get riwayat by patient id      |
| POST    | /riwayat          | Insert riwayat     |
| POST    | /riwayat?id={id}  | Update riwayat     |
| DELETE  | /riwayat?id={id}  | Delete riwayat     |
