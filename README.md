# Input Sanitizer

Sanitizes a string or array to prevent common vulnerabilities.

## Installation

Use the Composer to install `Input-Sanitizer`.

```bash
composer require academy01/input-sanitizer
```

## Usage
add it to your project and use the commands.
```PHP
require 'vendor/autoload.php';
```

## Commands
to sanitize the string or array use this, and pass the input:
```PHP
InputSanitizer::sanitize($input);
```
## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/)