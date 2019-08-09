# WordPress reviews plugin by Wiremo

This is Wiremo plugin for WordPress where for working with gutenberg blocks there is using [create-guten-block](https://github.com/ahmadawais/create-guten-block).

## Installation

- install node -v (https://nodejs.org/en/download/)
- install npm (https://www.npmjs.com/get-npm)


```bash
npm install
```

### Workflow!

#### 👉  `npm start`
- Use to compile and run the block in development mode.
- Watches for any changes and reports back any errors in your code.

#### 👉  `npm run build`
- Use to build production code for your block inside `dist` folder.
- Runs once and reports back the gzip file sizes of the produced code.

#### 👉  `npm run eject`
- Use to eject your plugin out of `create-guten-block`.
- Provides all the configurations so you can customize the project as you want.
- It's a one-way street, `eject` and you have to maintain everything yourself.
- You don't normally have to `eject` a project because by ejecting you lose the connection with `create-guten-block` and from there onwards you have to update and maintain all the dependencies on your own.

_That's about it._