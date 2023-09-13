# API Documentation



## Balance

### Get Account Balances

- **URL:** `GET http://{baseUrl}/api/balance.php`

- **Description:** Retrieve the account balances for all users.

- **Response:**
  ```json
  {
    "status": 200,
    "data": [
      {
        "id_balance": "1",
        "user_id": "1",
        "balance": "21000"
      },
      {
        "id_balance": "2",
        "user_id": "2",
        "balance": "49000"
      }
    ]
  }

## Transfer

### Transfer Money

- **URL:** `POST http://{baseUrl}/api/transfer.php`

- **Description:** Transfer money from one user to another by providing a JSON payload in the request body.

- **Request Body:**
  ```json
  {
    "from": 1,
    "to": 2,
    "amount": 1000
  }
  
- **Response:** ***Success***
  ```json
  {
    "status": 200,
    "message": "Transfer success"
  }

- **Response:** ***Failed***
  ```json
  {
    "status": 400,
    "message": "Insufficient balance"
  }
