/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * JS Errors: Syntax Error 3
 *
 * You have an error in an minified script.
 * After you made it prettier the following code appears.
 *
 * @todo: Find the mistake and correct it.
 */

x = function(d, e, a, c, b, f) {
    b = function(a) {
        return (a < e ? "" : b(parseInt(a / e))) + (35 < (a %= e) ? String.fromCharCode(a + 29) : a.toString(36))
    }};

    if (!"".replace(/^/, String)) {
        for (; a--;) f[b(a)] = c[a] || b(a);
        c = [function(a) {
            return f[a]
        }];
        b = function() {
            return "\\w+"
        };
        a = 1
    }

    for (; a--;) c[a] && (d = d.replace(new RegExp("\\b" + b(a) + "\\b", "g"), c[a]));

    return d
}
