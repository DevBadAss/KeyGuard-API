# KeyGuard API Documentation

This PHP API provides an easy way to perform hash operations. It supports two main actions:

`Hash`: Hashes a given string using SHA256 algorithm

`Verify`: Verifies if a given string matches a given hash

## Usage

### Hash Action

To hash a string, make a POST request to the script with the following parameters:

`action`: The action to perform, which should be set to hash

`value`: The string to hash

Example Request:

```javascript

fetch('http://your-domain.com/keyguard-api/api/.', {

    method: 'POST',

    headers: {

        'Content-Type': 'application/json'

    },

    body: JSON.stringify({

        action: 'hash',

        value: 'My Secret Password'

    })

}).then(response => {

    console.log(response.json());

});

```

Example Response: 

```json

{

    "hash": "3b2ec07c0e5f068d8fc6f8fb708e3c0f3f98e3d6b0e4e421c2d950a0dc8eaee9"

}

```

### Verify Action

To verify if a string matches a hash, make a POST request to the script with the following parameters:

`action`: The action to perform, which should be set to verify

`value`: The string to verify

`hash`: The hash to compare against

Example Request:

```javascript

fetch('http://your-domain.com/keyguard-api/api/', {

    method: 'POST',

    headers: {

        'Content-Type': 'application/json'

    },

    body: JSON.stringify({

        action: 'verify',

        value: 'My Secret Password',

        hash: '3b2ec07c0e5f068d8fc6f8fb708e3c0f3f98e3d6b0e4e421c2d950a0dc8eaee9'

    })

}).then(response => {

    console.log(response.json());

});

```

Example Response: 

```json

{

    "status": "Verified"

}

```

## Authors

- [@DevBadAss](https://www.github.com/devbadass)
