module.exports = {
  ci: {
    upload: {
      target: 'lhci',
    },
    assert: {
      preset: 'lighthouse:recommended',
      "assertions": {
        "dom-size": ["error", {"maxNumericValue": 3000}],
        "first-contentful-paint": ["warn", {"maxNumericValue": 3000}],
        "viewport": "error",
        "installable-manifest": "off",
        "offline-start-url": "off",
        "service-worker": "off",
        "splash-screen": "off",
        "works-offline": "off"
      }
    },
  },
};