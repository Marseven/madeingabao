/* @ds-bundle: {"format":3,"namespace":"MRTECHMEBODORICHARDDesignSystem_88d510","components":[{"name":"Avatar","sourcePath":"components/core/Avatar.jsx"},{"name":"Badge","sourcePath":"components/core/Badge.jsx"},{"name":"Button","sourcePath":"components/core/Button.jsx"},{"name":"IconButton","sourcePath":"components/core/IconButton.jsx"},{"name":"Logo","sourcePath":"components/core/Logo.jsx"},{"name":"Tag","sourcePath":"components/core/Tag.jsx"},{"name":"ProgressBar","sourcePath":"components/data/ProgressBar.jsx"},{"name":"StatCard","sourcePath":"components/data/StatCard.jsx"},{"name":"Alert","sourcePath":"components/feedback/Alert.jsx"},{"name":"Checkbox","sourcePath":"components/forms/Checkbox.jsx"},{"name":"Input","sourcePath":"components/forms/Input.jsx"},{"name":"Radio","sourcePath":"components/forms/Radio.jsx"},{"name":"Select","sourcePath":"components/forms/Select.jsx"},{"name":"Switch","sourcePath":"components/forms/Switch.jsx"},{"name":"Textarea","sourcePath":"components/forms/Textarea.jsx"},{"name":"Card","sourcePath":"components/layout/Card.jsx"},{"name":"Tabs","sourcePath":"components/navigation/Tabs.jsx"}],"sourceHashes":{"components/core/Avatar.jsx":"645921187100","components/core/Badge.jsx":"0420ff97d3e0","components/core/Button.jsx":"bf14b30e99f2","components/core/IconButton.jsx":"c44edf99e021","components/core/Logo.jsx":"696a247bc729","components/core/Tag.jsx":"33d4cf3938e7","components/data/ProgressBar.jsx":"37288d9f974a","components/data/StatCard.jsx":"829e6295ce89","components/feedback/Alert.jsx":"fe762aefba32","components/forms/Checkbox.jsx":"05b7d9833f75","components/forms/Input.jsx":"b3e56ff9c0f1","components/forms/Radio.jsx":"8347b7b08d9d","components/forms/Select.jsx":"33fc9df5dc81","components/forms/Switch.jsx":"1a7b5359c4ff","components/forms/Textarea.jsx":"26667a787a08","components/layout/Card.jsx":"4f0d4f3e28c2","components/navigation/Tabs.jsx":"a28a4f6fcdc0","developer-handoff/tailwind.theme.js":"c5ade86a6e94","ui_kits/mebodo-portfolio/PfIcon.jsx":"50baeeba180d","ui_kits/mebodo-portfolio/PortfolioBody.jsx":"c7998f1ac7e9","ui_kits/mebodo-portfolio/PortfolioHero.jsx":"e9489b2dfce8","ui_kits/mrtech-site/Contact.jsx":"7916b6ffcbf6","ui_kits/mrtech-site/Header.jsx":"247a41eed012","ui_kits/mrtech-site/Hero.jsx":"8bafcae884cd","ui_kits/mrtech-site/MrIcon.jsx":"20466f9993a2","ui_kits/mrtech-site/Process.jsx":"5b6e21d8426f","ui_kits/mrtech-site/Services.jsx":"eac8ca578b42"},"inlinedExternals":[],"unexposedExports":[]} */

(() => {

const __ds_ns = (window.MRTECHMEBODORICHARDDesignSystem_88d510 = window.MRTECHMEBODORICHARDDesignSystem_88d510 || {});

const __ds_scope = {};

(__ds_ns.__errors = __ds_ns.__errors || []);

// components/core/Avatar.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Avatar — circular profile image with initials fallback + optional status ring.
 */
function Avatar({
  src = null,
  name = '',
  size = 'md',
  status = null,
  // 'online' | 'busy' | 'offline'
  ring = false,
  style = {},
  ...rest
}) {
  const dims = {
    xs: 24,
    sm: 32,
    md: 40,
    lg: 56,
    xl: 80
  }[size] || 40;
  const initials = name.split(' ').map(w => w[0]).filter(Boolean).slice(0, 2).join('').toUpperCase();
  const statusColors = {
    online: 'var(--color-success)',
    busy: 'var(--color-warning)',
    offline: 'var(--grey-400)'
  };
  return /*#__PURE__*/React.createElement("span", _extends({
    style: {
      position: 'relative',
      display: 'inline-flex',
      ...style
    }
  }, rest), /*#__PURE__*/React.createElement("span", {
    style: {
      width: dims,
      height: dims,
      borderRadius: '50%',
      overflow: 'hidden',
      display: 'inline-flex',
      alignItems: 'center',
      justifyContent: 'center',
      background: 'var(--color-teal-forest)',
      color: '#fff',
      fontFamily: 'var(--font-heading)',
      fontWeight: 'var(--fw-semibold)',
      fontSize: dims * 0.4,
      border: ring ? '2px solid var(--color-lime)' : 'none',
      boxSizing: 'border-box'
    }
  }, src ? /*#__PURE__*/React.createElement("img", {
    src: src,
    alt: name,
    style: {
      width: '100%',
      height: '100%',
      objectFit: 'cover'
    }
  }) : initials || '?'), status && /*#__PURE__*/React.createElement("span", {
    style: {
      position: 'absolute',
      bottom: 0,
      right: 0,
      width: dims * 0.28,
      height: dims * 0.28,
      minWidth: 8,
      minHeight: 8,
      borderRadius: '50%',
      background: statusColors[status],
      border: '2px solid #fff'
    }
  }));
}
Object.assign(__ds_scope, { Avatar });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/core/Avatar.jsx", error: String((e && e.message) || e) }); }

// components/core/Badge.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Badge / status pill. Tone-driven colors aligned with the palette.
 */
function Badge({
  children,
  tone = 'neutral',
  variant = 'soft',
  size = 'md',
  dot = false,
  style = {},
  ...rest
}) {
  const palettes = {
    neutral: {
      fg: 'var(--grey-700)',
      soft: 'var(--grey-100)',
      solid: 'var(--grey-700)'
    },
    brand: {
      fg: 'var(--color-teal-forest)',
      soft: 'var(--teal-10)',
      solid: 'var(--color-teal-forest)'
    },
    accent: {
      fg: 'var(--lime-90)',
      soft: 'var(--lime-20)',
      solid: 'var(--accent-primary)'
    },
    navy: {
      fg: 'var(--color-deep-navy)',
      soft: 'var(--navy-10)',
      solid: 'var(--color-deep-navy)'
    },
    success: {
      fg: 'var(--color-success)',
      soft: 'var(--color-success-bg)',
      solid: 'var(--color-success)'
    },
    warning: {
      fg: '#946800',
      soft: 'var(--color-warning-bg)',
      solid: 'var(--color-warning)'
    },
    error: {
      fg: 'var(--color-error)',
      soft: 'var(--color-error-bg)',
      solid: 'var(--color-error)'
    },
    info: {
      fg: 'var(--color-info)',
      soft: 'var(--color-info-bg)',
      solid: 'var(--color-info)'
    }
  };
  const p = palettes[tone] || palettes.neutral;
  const dims = size === 'sm' ? {
    fs: 11,
    pad: '2px 8px',
    h: 20
  } : {
    fs: 12,
    pad: '4px 10px',
    h: 24
  };
  const isSolid = variant === 'solid';
  const isOutline = variant === 'outline';
  const accentSolidFg = tone === 'accent' ? 'var(--color-deep-navy)' : '#fff';
  return /*#__PURE__*/React.createElement("span", _extends({
    style: {
      display: 'inline-flex',
      alignItems: 'center',
      gap: 6,
      height: dims.h,
      padding: dims.pad,
      fontFamily: 'var(--font-body)',
      fontWeight: 'var(--fw-semibold)',
      fontSize: dims.fs,
      lineHeight: 1,
      letterSpacing: '0.01em',
      borderRadius: 'var(--radius-sm)',
      background: isSolid ? p.solid : isOutline ? 'transparent' : p.soft,
      color: isSolid ? accentSolidFg : p.fg,
      border: isOutline ? `1.5px solid ${p.fg}` : '1.5px solid transparent',
      ...style
    }
  }, rest), dot && /*#__PURE__*/React.createElement("span", {
    style: {
      width: 6,
      height: 6,
      borderRadius: '50%',
      background: 'currentColor'
    }
  }), children);
}
Object.assign(__ds_scope, { Badge });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/core/Badge.jsx", error: String((e && e.message) || e) }); }

// components/core/Button.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Button — MR TECH / MEBODO RICHARD primary action component.
 * Variants follow the charte: Lime CTA fills, Teal Forest brand,
 * navy/teal text. Premium variant adds the lime glow.
 */
function Button({
  children,
  variant = 'primary',
  size = 'md',
  fullWidth = false,
  disabled = false,
  loading = false,
  iconLeft = null,
  iconRight = null,
  type = 'button',
  onClick,
  style = {},
  ...rest
}) {
  const sizes = {
    sm: {
      padding: '0 14px',
      height: 36,
      fontSize: 14
    },
    md: {
      padding: '0 20px',
      height: 44,
      fontSize: 15
    },
    lg: {
      padding: '0 28px',
      height: 52,
      fontSize: 16
    }
  };
  const s = sizes[size] || sizes.md;
  const base = {
    display: 'inline-flex',
    alignItems: 'center',
    justifyContent: 'center',
    gap: 'var(--space-2)',
    height: s.height,
    padding: s.padding,
    fontFamily: 'var(--font-body)',
    fontWeight: 'var(--fw-semibold)',
    fontSize: s.fontSize,
    letterSpacing: '0.01em',
    lineHeight: 1,
    borderRadius: 'var(--radius-button)',
    border: '1.5px solid transparent',
    cursor: disabled || loading ? 'not-allowed' : 'pointer',
    width: fullWidth ? '100%' : 'auto',
    transition: 'background var(--dur-base) var(--ease-standard), color var(--dur-base) var(--ease-standard), border-color var(--dur-base) var(--ease-standard), box-shadow var(--dur-base) var(--ease-standard), transform var(--dur-fast) var(--ease-standard)',
    opacity: disabled ? 0.5 : 1,
    whiteSpace: 'nowrap',
    ...style
  };
  const variants = {
    primary: {
      background: 'var(--accent-primary)',
      color: 'var(--color-deep-navy)',
      borderColor: 'var(--accent-primary)'
    },
    premium: {
      background: 'var(--accent-primary)',
      color: 'var(--color-deep-navy)',
      borderColor: 'var(--accent-primary)',
      boxShadow: 'var(--shadow-lime)'
    },
    secondary: {
      background: 'var(--color-teal-forest)',
      color: '#fff',
      borderColor: 'var(--color-teal-forest)'
    },
    tertiary: {
      background: 'transparent',
      color: 'var(--color-teal-forest)',
      borderColor: 'var(--border-strong)'
    },
    ghost: {
      background: 'transparent',
      color: 'var(--color-deep-navy)',
      borderColor: 'transparent'
    },
    link: {
      background: 'transparent',
      color: 'var(--text-link)',
      borderColor: 'transparent',
      height: 'auto',
      padding: 0,
      textDecoration: 'underline',
      textUnderlineOffset: 3
    }
  };
  const [hover, setHover] = React.useState(false);
  const hovers = {
    primary: {
      background: 'var(--accent-primary-hover)',
      borderColor: 'var(--accent-primary-hover)'
    },
    premium: {
      background: 'var(--color-electric-lime)',
      borderColor: 'var(--color-electric-lime)'
    },
    secondary: {
      background: 'var(--teal-90)',
      borderColor: 'var(--teal-90)'
    },
    tertiary: {
      background: 'var(--teal-10)',
      borderColor: 'var(--color-teal-forest)'
    },
    ghost: {
      background: 'var(--grey-100)'
    },
    link: {
      color: 'var(--accent-primary-hover)'
    }
  };
  const finalStyle = {
    ...base,
    ...variants[variant],
    ...(hover && !disabled && !loading ? hovers[variant] : {})
  };
  return /*#__PURE__*/React.createElement("button", _extends({
    type: type,
    disabled: disabled || loading,
    onClick: onClick,
    onMouseEnter: () => setHover(true),
    onMouseLeave: () => setHover(false),
    style: finalStyle
  }, rest), loading && /*#__PURE__*/React.createElement("span", {
    "aria-hidden": true,
    style: {
      width: 15,
      height: 15,
      borderRadius: '50%',
      border: '2px solid currentColor',
      borderTopColor: 'transparent',
      display: 'inline-block',
      animation: 'mr-spin 0.7s linear infinite'
    }
  }), !loading && iconLeft, children, !loading && iconRight, /*#__PURE__*/React.createElement("style", null, '@keyframes mr-spin{to{transform:rotate(360deg)}}'));
}
Object.assign(__ds_scope, { Button });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/core/Button.jsx", error: String((e && e.message) || e) }); }

// components/core/IconButton.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * IconButton — square/circular button wrapping a single icon.
 */
function IconButton({
  children,
  variant = 'ghost',
  size = 'md',
  rounded = false,
  disabled = false,
  ariaLabel,
  onClick,
  style = {},
  ...rest
}) {
  const dims = {
    sm: 32,
    md: 40,
    lg: 48
  }[size] || 40;
  const [hover, setHover] = React.useState(false);
  const variants = {
    solid: {
      background: 'var(--color-teal-forest)',
      color: '#fff',
      border: '1.5px solid var(--color-teal-forest)'
    },
    accent: {
      background: 'var(--accent-primary)',
      color: 'var(--color-deep-navy)',
      border: '1.5px solid var(--accent-primary)'
    },
    outline: {
      background: 'transparent',
      color: 'var(--color-deep-navy)',
      border: '1.5px solid var(--border-strong)'
    },
    ghost: {
      background: 'transparent',
      color: 'var(--color-deep-navy)',
      border: '1.5px solid transparent'
    }
  };
  const hovers = {
    solid: {
      background: 'var(--teal-90)'
    },
    accent: {
      background: 'var(--accent-primary-hover)'
    },
    outline: {
      background: 'var(--grey-100)'
    },
    ghost: {
      background: 'var(--grey-100)'
    }
  };
  return /*#__PURE__*/React.createElement("button", _extends({
    type: "button",
    "aria-label": ariaLabel,
    disabled: disabled,
    onClick: onClick,
    onMouseEnter: () => setHover(true),
    onMouseLeave: () => setHover(false),
    style: {
      width: dims,
      height: dims,
      display: 'inline-flex',
      alignItems: 'center',
      justifyContent: 'center',
      borderRadius: rounded ? 'var(--radius-full)' : 'var(--radius-button)',
      cursor: disabled ? 'not-allowed' : 'pointer',
      opacity: disabled ? 0.5 : 1,
      transition: 'var(--transition-base)',
      ...variants[variant],
      ...(hover && !disabled ? hovers[variant] : {}),
      ...style
    }
  }, rest), children);
}
Object.assign(__ds_scope, { IconButton });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/core/IconButton.jsx", error: String((e && e.message) || e) }); }

// components/core/Logo.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Logo lockup for MR TECH / MEBODO RICHARD. Composes the glyph image
 * with a typographic wordmark. Brand switches the name; theme switches
 * the color treatment. Point `glyphSrc` at your copied glyph asset.
 */
function Logo({
  brand = 'mrtech',
  // 'mrtech' | 'mebodo'
  theme = 'navy',
  // 'navy' | 'teal' | 'light' (light = for dark bg)
  glyphOnly = false,
  glyphSrc,
  height = 40,
  style = {},
  ...rest
}) {
  const themes = {
    navy: {
      glyph: 'glyph-navy.png',
      mr: 'var(--color-deep-navy)',
      tech: 'var(--color-lime)',
      name: 'var(--color-deep-navy)'
    },
    teal: {
      glyph: 'glyph-teal.png',
      mr: 'var(--color-teal-forest)',
      tech: 'var(--color-lime)',
      name: 'var(--color-teal-forest)'
    },
    light: {
      glyph: 'glyph-white.png',
      mr: '#FFFFFF',
      tech: 'var(--color-lime)',
      name: '#FFFFFF'
    }
  };
  const t = themes[theme] || themes.navy;
  const src = glyphSrc || `assets/${t.glyph}`;
  const isMr = brand === 'mrtech';
  return /*#__PURE__*/React.createElement("span", _extends({
    style: {
      display: 'inline-flex',
      alignItems: 'center',
      gap: height * 0.28,
      ...style
    }
  }, rest), /*#__PURE__*/React.createElement("img", {
    src: src,
    alt: "MR",
    style: {
      height,
      width: 'auto',
      display: 'block'
    }
  }), !glyphOnly && (isMr ? /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-heading)',
      fontWeight: 'var(--fw-bold)',
      fontSize: height * 0.62,
      letterSpacing: '-0.01em',
      lineHeight: 1
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      color: t.mr
    }
  }, "MR"), /*#__PURE__*/React.createElement("span", {
    style: {
      color: t.tech
    }
  }, "TECH")) : /*#__PURE__*/React.createElement("span", {
    style: {
      display: 'flex',
      flexDirection: 'column',
      lineHeight: 1.05
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-heading)',
      fontWeight: 'var(--fw-bold)',
      fontSize: height * 0.42,
      letterSpacing: '0.01em',
      color: t.name
    }
  }, "MEBODO"), /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-heading)',
      fontWeight: 'var(--fw-light, 300)',
      fontSize: height * 0.42,
      letterSpacing: '0.14em',
      color: t.name
    }
  }, "RICHARD"))));
}
Object.assign(__ds_scope, { Logo });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/core/Logo.jsx", error: String((e && e.message) || e) }); }

// components/core/Tag.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Tag — tech/skill chip. Optional monospace (echoes code glyph) and remove button.
 */
function Tag({
  children,
  mono = false,
  removable = false,
  onRemove,
  active = false,
  icon = null,
  style = {},
  ...rest
}) {
  return /*#__PURE__*/React.createElement("span", _extends({
    style: {
      display: 'inline-flex',
      alignItems: 'center',
      gap: 6,
      padding: '5px 12px',
      fontFamily: mono ? 'var(--font-mono)' : 'var(--font-body)',
      fontWeight: 'var(--fw-medium)',
      fontSize: 13,
      lineHeight: 1,
      color: active ? 'var(--color-deep-navy)' : 'var(--text-secondary)',
      background: active ? 'var(--lime-20)' : 'var(--grey-100)',
      border: `1.5px solid ${active ? 'var(--color-lime)' : 'var(--border-default)'}`,
      borderRadius: 'var(--radius-sm)',
      ...style
    }
  }, rest), icon, children, removable && /*#__PURE__*/React.createElement("button", {
    type: "button",
    "aria-label": "Remove",
    onClick: onRemove,
    style: {
      border: 'none',
      background: 'transparent',
      cursor: 'pointer',
      color: 'inherit',
      opacity: 0.6,
      padding: 0,
      marginLeft: 2,
      display: 'inline-flex',
      fontSize: 14,
      lineHeight: 1
    }
  }, "\xD7"));
}
Object.assign(__ds_scope, { Tag });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/core/Tag.jsx", error: String((e && e.message) || e) }); }

// components/data/ProgressBar.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/** Progress bar. value 0-100. Lime fill (or gradient lime->electric). */
function ProgressBar({
  value = 0,
  label,
  showValue = false,
  tone = 'lime',
  size = 'md',
  style = {},
  ...rest
}) {
  const h = {
    sm: 6,
    md: 10,
    lg: 14
  }[size] || 10;
  const fills = {
    lime: 'linear-gradient(90deg, var(--color-lime), var(--color-electric-lime))',
    teal: 'var(--color-teal-forest)',
    navy: 'var(--color-deep-navy)'
  };
  const v = Math.max(0, Math.min(100, value));
  return /*#__PURE__*/React.createElement("div", _extends({
    style: {
      display: 'flex',
      flexDirection: 'column',
      gap: 6,
      ...style
    }
  }, rest), (label || showValue) && /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      justifyContent: 'space-between',
      fontFamily: 'var(--font-body)',
      fontSize: 13
    }
  }, label && /*#__PURE__*/React.createElement("span", {
    style: {
      fontWeight: 'var(--fw-semibold)',
      color: 'var(--text-primary)'
    }
  }, label), showValue && /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-mono)',
      color: 'var(--text-secondary)'
    }
  }, v, "%")), /*#__PURE__*/React.createElement("div", {
    style: {
      height: h,
      background: 'var(--grey-200)',
      borderRadius: 'var(--radius-full)',
      overflow: 'hidden'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      width: `${v}%`,
      height: '100%',
      background: fills[tone],
      borderRadius: 'var(--radius-full)',
      transition: 'width var(--dur-slow) var(--ease-out)'
    }
  })));
}
Object.assign(__ds_scope, { ProgressBar });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/data/ProgressBar.jsx", error: String((e && e.message) || e) }); }

// components/data/StatCard.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/** Stat / KPI block. */
function StatCard({
  value,
  label,
  delta = null,
  deltaTone = 'success',
  icon = null,
  variant = 'default',
  style = {},
  ...rest
}) {
  const dark = variant === 'dark';
  const deltaColors = {
    success: 'var(--color-success)',
    error: 'var(--color-error)',
    neutral: 'var(--text-muted)'
  };
  return /*#__PURE__*/React.createElement("div", _extends({
    style: {
      display: 'flex',
      flexDirection: 'column',
      gap: 8,
      padding: 'var(--space-6)',
      borderRadius: 'var(--radius-card)',
      background: dark ? 'var(--color-deep-navy)' : 'var(--surface-card)',
      border: dark ? '1px solid rgba(255,255,255,0.08)' : '1px solid var(--border-default)',
      boxShadow: dark ? 'none' : 'var(--shadow-soft)',
      ...style
    }
  }, rest), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'space-between'
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-mono)',
      fontSize: 12,
      letterSpacing: '0.08em',
      textTransform: 'uppercase',
      color: dark ? 'var(--text-on-dark-muted)' : 'var(--text-muted)'
    }
  }, label), icon && /*#__PURE__*/React.createElement("span", {
    style: {
      color: 'var(--color-lime)',
      display: 'flex'
    }
  }, icon)), /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-heading)',
      fontWeight: 'var(--fw-bold)',
      fontSize: 36,
      lineHeight: 1,
      color: dark ? '#fff' : 'var(--text-primary)'
    }
  }, value), delta && /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-body)',
      fontWeight: 'var(--fw-semibold)',
      fontSize: 13,
      color: deltaColors[deltaTone]
    }
  }, delta));
}
Object.assign(__ds_scope, { StatCard });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/data/StatCard.jsx", error: String((e && e.message) || e) }); }

// components/feedback/Alert.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/** Alert / inline feedback banner. */
function Alert({
  children,
  title,
  tone = 'info',
  onClose,
  icon = null,
  style = {},
  ...rest
}) {
  const palettes = {
    success: {
      fg: 'var(--color-success)',
      bg: 'var(--color-success-bg)',
      icon: '✓'
    },
    warning: {
      fg: '#946800',
      bg: 'var(--color-warning-bg)',
      icon: '!'
    },
    error: {
      fg: 'var(--color-error)',
      bg: 'var(--color-error-bg)',
      icon: '✕'
    },
    info: {
      fg: 'var(--color-info)',
      bg: 'var(--color-info-bg)',
      icon: 'i'
    }
  };
  const p = palettes[tone] || palettes.info;
  return /*#__PURE__*/React.createElement("div", _extends({
    role: "alert",
    style: {
      display: 'flex',
      gap: 12,
      padding: '14px 16px',
      background: p.bg,
      borderRadius: 'var(--radius-md)',
      borderLeft: `3px solid ${p.fg}`,
      ...style
    }
  }, rest), /*#__PURE__*/React.createElement("span", {
    style: {
      flexShrink: 0,
      width: 22,
      height: 22,
      borderRadius: '50%',
      background: p.fg,
      color: '#fff',
      display: 'inline-flex',
      alignItems: 'center',
      justifyContent: 'center',
      fontSize: 13,
      fontWeight: 700,
      fontFamily: 'var(--font-body)'
    }
  }, icon || p.icon), /*#__PURE__*/React.createElement("div", {
    style: {
      flex: 1,
      display: 'flex',
      flexDirection: 'column',
      gap: 2
    }
  }, title && /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-body)',
      fontWeight: 'var(--fw-bold)',
      fontSize: 14,
      color: 'var(--text-primary)'
    }
  }, title), /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 14,
      color: 'var(--text-secondary)',
      lineHeight: 1.5
    }
  }, children)), onClose && /*#__PURE__*/React.createElement("button", {
    type: "button",
    "aria-label": "Fermer",
    onClick: onClose,
    style: {
      border: 'none',
      background: 'transparent',
      cursor: 'pointer',
      color: 'var(--text-muted)',
      fontSize: 16,
      padding: 0,
      alignSelf: 'flex-start'
    }
  }, "\xD7"));
}
Object.assign(__ds_scope, { Alert });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/feedback/Alert.jsx", error: String((e && e.message) || e) }); }

// components/forms/Checkbox.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/** Checkbox with label. Lime check when selected. */
function Checkbox({
  label,
  checked = false,
  onChange,
  disabled = false,
  id,
  style = {},
  ...rest
}) {
  const reactId = React.useId();
  const inputId = id || reactId;
  return /*#__PURE__*/React.createElement("label", {
    htmlFor: inputId,
    style: {
      display: 'inline-flex',
      alignItems: 'center',
      gap: 10,
      cursor: disabled ? 'not-allowed' : 'pointer',
      opacity: disabled ? 0.5 : 1,
      ...style
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      position: 'relative',
      display: 'inline-flex'
    }
  }, /*#__PURE__*/React.createElement("input", _extends({
    id: inputId,
    type: "checkbox",
    checked: checked,
    onChange: onChange,
    disabled: disabled,
    style: {
      position: 'absolute',
      opacity: 0,
      width: 0,
      height: 0
    }
  }, rest)), /*#__PURE__*/React.createElement("span", {
    style: {
      width: 20,
      height: 20,
      borderRadius: 'var(--radius-xs)',
      border: `1.5px solid ${checked ? 'var(--color-lime)' : 'var(--border-strong)'}`,
      background: checked ? 'var(--color-lime)' : 'var(--background-default)',
      display: 'inline-flex',
      alignItems: 'center',
      justifyContent: 'center',
      transition: 'var(--transition-base)'
    }
  }, checked && /*#__PURE__*/React.createElement("svg", {
    width: "12",
    height: "12",
    viewBox: "0 0 12 12",
    fill: "none"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M2.5 6.2 5 8.7l4.5-5",
    stroke: "var(--color-deep-navy)",
    strokeWidth: "2",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  })))), label && /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 15,
      color: 'var(--text-primary)'
    }
  }, label));
}
Object.assign(__ds_scope, { Checkbox });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/forms/Checkbox.jsx", error: String((e && e.message) || e) }); }

// components/forms/Input.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Input — text field supporting all text-like types, validation states,
 * icons, prefix/suffix. Use type="password" / "email" / "search" etc.
 */
function Input({
  label,
  hint,
  error,
  success,
  type = 'text',
  placeholder,
  value,
  onChange,
  disabled = false,
  iconLeft = null,
  iconRight = null,
  size = 'md',
  required = false,
  id,
  style = {},
  ...rest
}) {
  const [focus, setFocus] = React.useState(false);
  const dims = {
    sm: 38,
    md: 44,
    lg: 52
  }[size] || 44;
  const reactId = React.useId();
  const inputId = id || reactId;
  const state = error ? 'error' : success ? 'success' : 'default';
  const borderColor = disabled ? 'var(--border-default)' : focus ? 'var(--color-lime)' : state === 'error' ? 'var(--color-error)' : state === 'success' ? 'var(--color-success)' : 'var(--border-strong)';
  return /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      flexDirection: 'column',
      gap: 6,
      ...style
    }
  }, label && /*#__PURE__*/React.createElement("label", {
    htmlFor: inputId,
    style: {
      fontFamily: 'var(--font-body)',
      fontWeight: 'var(--fw-semibold)',
      fontSize: 13,
      color: 'var(--text-primary)'
    }
  }, label, required && /*#__PURE__*/React.createElement("span", {
    style: {
      color: 'var(--color-error)'
    }
  }, " *")), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      alignItems: 'center',
      gap: 8,
      height: dims,
      padding: '0 14px',
      background: disabled ? 'var(--grey-100)' : 'var(--background-default)',
      border: `1.5px solid ${borderColor}`,
      borderRadius: 'var(--radius-input)',
      boxShadow: focus ? 'var(--focus-ring)' : 'none',
      transition: 'var(--transition-base)',
      opacity: disabled ? 0.6 : 1
    }
  }, iconLeft && /*#__PURE__*/React.createElement("span", {
    style: {
      display: 'flex',
      color: 'var(--text-muted)'
    }
  }, iconLeft), /*#__PURE__*/React.createElement("input", _extends({
    id: inputId,
    type: type,
    placeholder: placeholder,
    value: value,
    onChange: onChange,
    disabled: disabled,
    required: required,
    onFocus: () => setFocus(true),
    onBlur: () => setFocus(false),
    style: {
      flex: 1,
      border: 'none',
      outline: 'none',
      background: 'transparent',
      fontFamily: 'var(--font-body)',
      fontSize: size === 'sm' ? 14 : 15,
      color: 'var(--text-primary)',
      minWidth: 0
    }
  }, rest)), iconRight && /*#__PURE__*/React.createElement("span", {
    style: {
      display: 'flex',
      color: 'var(--text-muted)'
    }
  }, iconRight)), (hint || error || success) && /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 12,
      color: error ? 'var(--color-error)' : success ? 'var(--color-success)' : 'var(--text-muted)'
    }
  }, error || success || hint));
}
Object.assign(__ds_scope, { Input });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/forms/Input.jsx", error: String((e && e.message) || e) }); }

// components/forms/Radio.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/** Radio button with label. */
function Radio({
  label,
  checked = false,
  onChange,
  name,
  value,
  disabled = false,
  id,
  style = {},
  ...rest
}) {
  const reactId = React.useId();
  const inputId = id || reactId;
  return /*#__PURE__*/React.createElement("label", {
    htmlFor: inputId,
    style: {
      display: 'inline-flex',
      alignItems: 'center',
      gap: 10,
      cursor: disabled ? 'not-allowed' : 'pointer',
      opacity: disabled ? 0.5 : 1,
      ...style
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      position: 'relative',
      display: 'inline-flex'
    }
  }, /*#__PURE__*/React.createElement("input", _extends({
    id: inputId,
    type: "radio",
    name: name,
    value: value,
    checked: checked,
    onChange: onChange,
    disabled: disabled,
    style: {
      position: 'absolute',
      opacity: 0,
      width: 0,
      height: 0
    }
  }, rest)), /*#__PURE__*/React.createElement("span", {
    style: {
      width: 20,
      height: 20,
      borderRadius: '50%',
      border: `1.5px solid ${checked ? 'var(--color-lime)' : 'var(--border-strong)'}`,
      background: 'var(--background-default)',
      display: 'inline-flex',
      alignItems: 'center',
      justifyContent: 'center',
      transition: 'var(--transition-base)'
    }
  }, checked && /*#__PURE__*/React.createElement("span", {
    style: {
      width: 10,
      height: 10,
      borderRadius: '50%',
      background: 'var(--color-lime)'
    }
  }))), label && /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 15,
      color: 'var(--text-primary)'
    }
  }, label));
}
Object.assign(__ds_scope, { Radio });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/forms/Radio.jsx", error: String((e && e.message) || e) }); }

// components/forms/Select.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/** Select dropdown (native, brand-styled). options: [{value,label}] or strings. */
function Select({
  label,
  hint,
  error,
  options = [],
  value,
  onChange,
  placeholder = 'Choisir…',
  disabled = false,
  required = false,
  id,
  size = 'md',
  style = {},
  ...rest
}) {
  const [focus, setFocus] = React.useState(false);
  const reactId = React.useId();
  const inputId = id || reactId;
  const dims = {
    sm: 38,
    md: 44,
    lg: 52
  }[size] || 44;
  const borderColor = focus ? 'var(--color-lime)' : error ? 'var(--color-error)' : 'var(--border-strong)';
  const opts = options.map(o => typeof o === 'string' ? {
    value: o,
    label: o
  } : o);
  return /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      flexDirection: 'column',
      gap: 6,
      ...style
    }
  }, label && /*#__PURE__*/React.createElement("label", {
    htmlFor: inputId,
    style: {
      fontFamily: 'var(--font-body)',
      fontWeight: 'var(--fw-semibold)',
      fontSize: 13,
      color: 'var(--text-primary)'
    }
  }, label, required && /*#__PURE__*/React.createElement("span", {
    style: {
      color: 'var(--color-error)'
    }
  }, " *")), /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'relative',
      display: 'flex',
      alignItems: 'center'
    }
  }, /*#__PURE__*/React.createElement("select", _extends({
    id: inputId,
    value: value,
    onChange: onChange,
    disabled: disabled,
    required: required,
    onFocus: () => setFocus(true),
    onBlur: () => setFocus(false),
    style: {
      appearance: 'none',
      WebkitAppearance: 'none',
      width: '100%',
      height: dims,
      padding: '0 40px 0 14px',
      fontFamily: 'var(--font-body)',
      fontSize: 15,
      color: value ? 'var(--text-primary)' : 'var(--text-muted)',
      background: disabled ? 'var(--grey-100)' : 'var(--background-default)',
      border: `1.5px solid ${borderColor}`,
      borderRadius: 'var(--radius-input)',
      boxShadow: focus ? 'var(--focus-ring)' : 'none',
      outline: 'none',
      cursor: 'pointer',
      transition: 'var(--transition-base)'
    }
  }, rest), placeholder && /*#__PURE__*/React.createElement("option", {
    value: "",
    disabled: true
  }, placeholder), opts.map(o => /*#__PURE__*/React.createElement("option", {
    key: o.value,
    value: o.value
  }, o.label))), /*#__PURE__*/React.createElement("span", {
    style: {
      position: 'absolute',
      right: 14,
      pointerEvents: 'none',
      color: 'var(--text-muted)',
      fontSize: 12
    }
  }, "\u25BC")), (hint || error) && /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 12,
      color: error ? 'var(--color-error)' : 'var(--text-muted)'
    }
  }, error || hint));
}
Object.assign(__ds_scope, { Select });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/forms/Select.jsx", error: String((e && e.message) || e) }); }

// components/forms/Switch.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/** Toggle switch. Lime track when on. */
function Switch({
  label,
  checked = false,
  onChange,
  disabled = false,
  id,
  style = {},
  ...rest
}) {
  const reactId = React.useId();
  const inputId = id || reactId;
  return /*#__PURE__*/React.createElement("label", {
    htmlFor: inputId,
    style: {
      display: 'inline-flex',
      alignItems: 'center',
      gap: 10,
      cursor: disabled ? 'not-allowed' : 'pointer',
      opacity: disabled ? 0.5 : 1,
      ...style
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      position: 'relative',
      display: 'inline-flex'
    }
  }, /*#__PURE__*/React.createElement("input", _extends({
    id: inputId,
    type: "checkbox",
    role: "switch",
    checked: checked,
    onChange: onChange,
    disabled: disabled,
    style: {
      position: 'absolute',
      opacity: 0,
      width: 0,
      height: 0
    }
  }, rest)), /*#__PURE__*/React.createElement("span", {
    style: {
      width: 42,
      height: 24,
      borderRadius: 'var(--radius-full)',
      background: checked ? 'var(--color-lime)' : 'var(--grey-300)',
      transition: 'var(--transition-base)',
      display: 'inline-flex',
      alignItems: 'center',
      padding: 2
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      width: 20,
      height: 20,
      borderRadius: '50%',
      background: '#fff',
      boxShadow: 'var(--shadow-soft)',
      transform: checked ? 'translateX(18px)' : 'translateX(0)',
      transition: 'transform var(--dur-base) var(--ease-standard)'
    }
  }))), label && /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 15,
      color: 'var(--text-primary)'
    }
  }, label));
}
Object.assign(__ds_scope, { Switch });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/forms/Switch.jsx", error: String((e && e.message) || e) }); }

// components/forms/Textarea.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/** Multi-line text input. */
function Textarea({
  label,
  hint,
  error,
  placeholder,
  value,
  onChange,
  rows = 4,
  disabled = false,
  required = false,
  id,
  style = {},
  ...rest
}) {
  const [focus, setFocus] = React.useState(false);
  const reactId = React.useId();
  const inputId = id || reactId;
  const borderColor = focus ? 'var(--color-lime)' : error ? 'var(--color-error)' : 'var(--border-strong)';
  return /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      flexDirection: 'column',
      gap: 6,
      ...style
    }
  }, label && /*#__PURE__*/React.createElement("label", {
    htmlFor: inputId,
    style: {
      fontFamily: 'var(--font-body)',
      fontWeight: 'var(--fw-semibold)',
      fontSize: 13,
      color: 'var(--text-primary)'
    }
  }, label, required && /*#__PURE__*/React.createElement("span", {
    style: {
      color: 'var(--color-error)'
    }
  }, " *")), /*#__PURE__*/React.createElement("textarea", _extends({
    id: inputId,
    placeholder: placeholder,
    value: value,
    onChange: onChange,
    rows: rows,
    disabled: disabled,
    required: required,
    onFocus: () => setFocus(true),
    onBlur: () => setFocus(false),
    style: {
      resize: 'vertical',
      padding: '12px 14px',
      fontFamily: 'var(--font-body)',
      fontSize: 15,
      color: 'var(--text-primary)',
      background: disabled ? 'var(--grey-100)' : 'var(--background-default)',
      border: `1.5px solid ${borderColor}`,
      borderRadius: 'var(--radius-input)',
      boxShadow: focus ? 'var(--focus-ring)' : 'none',
      outline: 'none',
      transition: 'var(--transition-base)'
    }
  }, rest)), (hint || error) && /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 12,
      color: error ? 'var(--color-error)' : 'var(--text-muted)'
    }
  }, error || hint));
}
Object.assign(__ds_scope, { Textarea });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/forms/Textarea.jsx", error: String((e && e.message) || e) }); }

// components/layout/Card.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Card — versatile surface. Variants: default (white + soft shadow),
 * outline, elevated, dark (navy), teal, accent-top (lime top border).
 * Hover lifts when `interactive`.
 */
function Card({
  children,
  variant = 'default',
  padding = 'lg',
  interactive = false,
  accentTop = false,
  style = {},
  ...rest
}) {
  const [hover, setHover] = React.useState(false);
  const pads = {
    none: 0,
    sm: 'var(--space-4)',
    md: 'var(--space-6)',
    lg: 'var(--space-8)'
  };
  const variants = {
    default: {
      background: 'var(--surface-card)',
      border: '1px solid var(--border-default)',
      color: 'var(--text-primary)',
      boxShadow: 'var(--shadow-soft)'
    },
    outline: {
      background: 'var(--surface-card)',
      border: '1.5px solid var(--border-strong)',
      color: 'var(--text-primary)',
      boxShadow: 'none'
    },
    elevated: {
      background: 'var(--surface-card)',
      border: '1px solid var(--border-subtle)',
      color: 'var(--text-primary)',
      boxShadow: 'var(--shadow-elevated)'
    },
    dark: {
      background: 'var(--color-deep-navy)',
      border: '1px solid rgba(255,255,255,0.08)',
      color: 'var(--text-on-dark)',
      boxShadow: 'var(--shadow-medium)'
    },
    teal: {
      background: 'var(--color-teal-forest)',
      border: '1px solid rgba(255,255,255,0.08)',
      color: '#EAF1F0',
      boxShadow: 'var(--shadow-medium)'
    },
    sand: {
      background: 'var(--background-sand)',
      border: '1px solid var(--color-sand)',
      color: 'var(--text-primary)',
      boxShadow: 'none'
    }
  };
  return /*#__PURE__*/React.createElement("div", _extends({
    onMouseEnter: () => setHover(true),
    onMouseLeave: () => setHover(false),
    style: {
      borderRadius: 'var(--radius-card)',
      padding: pads[padding],
      position: 'relative',
      overflow: 'hidden',
      transition: 'transform var(--dur-base) var(--ease-out), box-shadow var(--dur-base) var(--ease-out)',
      ...variants[variant],
      ...(accentTop ? {
        borderTop: '3px solid var(--color-lime)'
      } : {}),
      ...(interactive ? {
        cursor: 'pointer'
      } : {}),
      ...(interactive && hover ? {
        transform: 'translateY(-4px)',
        boxShadow: 'var(--shadow-elevated)'
      } : {}),
      ...style
    }
  }, rest), children);
}
Object.assign(__ds_scope, { Card });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/layout/Card.jsx", error: String((e && e.message) || e) }); }

// components/navigation/Tabs.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/** Tabs — underline style with lime active indicator. tabs: [{id,label}] */
function Tabs({
  tabs = [],
  value,
  onChange,
  style = {},
  ...rest
}) {
  const [internal, setInternal] = React.useState(value ?? (tabs[0] && tabs[0].id));
  const active = value !== undefined ? value : internal;
  const select = id => {
    setInternal(id);
    onChange && onChange(id);
  };
  return /*#__PURE__*/React.createElement("div", _extends({
    role: "tablist",
    style: {
      display: 'flex',
      gap: 4,
      borderBottom: '1.5px solid var(--border-default)',
      ...style
    }
  }, rest), tabs.map(tab => {
    const isActive = tab.id === active;
    return /*#__PURE__*/React.createElement("button", {
      key: tab.id,
      role: "tab",
      "aria-selected": isActive,
      onClick: () => select(tab.id),
      style: {
        position: 'relative',
        border: 'none',
        background: 'transparent',
        cursor: 'pointer',
        padding: '12px 16px',
        marginBottom: -1.5,
        fontFamily: 'var(--font-body)',
        fontWeight: 'var(--fw-semibold)',
        fontSize: 15,
        color: isActive ? 'var(--color-deep-navy)' : 'var(--text-muted)',
        borderBottom: `2.5px solid ${isActive ? 'var(--color-lime)' : 'transparent'}`,
        transition: 'var(--transition-base)',
        display: 'inline-flex',
        alignItems: 'center',
        gap: 8
      }
    }, tab.icon, tab.label, tab.count != null && /*#__PURE__*/React.createElement("span", {
      style: {
        fontFamily: 'var(--font-mono)',
        fontSize: 11,
        padding: '1px 7px',
        borderRadius: 'var(--radius-full)',
        background: isActive ? 'var(--lime-20)' : 'var(--grey-100)',
        color: isActive ? 'var(--lime-90)' : 'var(--text-muted)'
      }
    }, tab.count));
  }));
}
Object.assign(__ds_scope, { Tabs });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/navigation/Tabs.jsx", error: String((e && e.message) || e) }); }

// developer-handoff/tailwind.theme.js
try { (() => {
/**
 * MR TECH / MEBODO RICHARD — simplified Tailwind theme.
 * Drop into tailwind.config.js `theme.extend`. Mirrors tokens/*.css.
 */
module.exports = {
  theme: {
    extend: {
      colors: {
        'teal-forest': '#005C53',
        'deep-navy': '#042940',
        lime: {
          DEFAULT: '#9FC131',
          electric: '#DBF227',
          10: '#F5F8E8',
          20: '#ECF2D1',
          30: '#D9E6A3',
          40: '#C5D976',
          50: '#B2CD48',
          60: '#9FC131',
          70: '#88A828',
          80: '#6F8A20',
          90: '#566B19',
          100: '#3D4D11'
        },
        teal: {
          10: '#E6EFEE',
          20: '#CCDEDC',
          30: '#99BEB9',
          40: '#669D96',
          50: '#338076',
          60: '#1A7066',
          70: '#006458',
          80: '#005C53',
          90: '#004A43',
          100: '#003832'
        },
        sand: '#D6D58E',
        success: '#2E9E5B',
        warning: '#E0A100',
        error: '#D64545',
        info: '#1C7FB8'
      },
      fontFamily: {
        heading: ['Space Grotesk', 'Expose', 'system-ui', 'sans-serif'],
        body: ['Manrope', 'Bespoke Sans', 'system-ui', 'sans-serif'],
        mono: ['JetBrains Mono', 'ui-monospace', 'monospace']
      },
      borderRadius: {
        xs: '4px',
        sm: '8px',
        md: '12px',
        lg: '16px',
        xl: '24px',
        '2xl': '32px'
      },
      boxShadow: {
        soft: '0 1px 2px rgba(4,41,64,0.06), 0 1px 3px rgba(4,41,64,0.08)',
        medium: '0 4px 8px rgba(4,41,64,0.06), 0 6px 16px rgba(4,41,64,0.10)',
        elevated: '0 8px 20px rgba(4,41,64,0.10), 0 16px 40px rgba(4,41,64,0.12)',
        premium: '0 20px 48px rgba(4,41,64,0.18), 0 8px 16px rgba(4,41,64,0.10)',
        lime: '0 6px 18px rgba(159,193,49,0.35)'
      },
      spacing: {
        1: '4px',
        2: '8px',
        3: '12px',
        4: '16px',
        6: '24px',
        8: '32px',
        10: '40px',
        12: '48px',
        16: '64px',
        20: '80px',
        24: '96px',
        32: '128px'
      },
      maxWidth: {
        container: '1320px',
        content: '1200px'
      },
      transitionTimingFunction: {
        standard: 'cubic-bezier(0.4,0,0.2,1)',
        entrance: 'cubic-bezier(0.16,1,0.3,1)'
      }
    }
  }
};
})(); } catch (e) { __ds_ns.__errors.push({ path: "developer-handoff/tailwind.theme.js", error: String((e && e.message) || e) }); }

// ui_kits/mebodo-portfolio/PfIcon.jsx
try { (() => {
// Lucide icon helper (CDN UMD must load first).
function PfIcon({
  name,
  size = 20,
  stroke = 2,
  color = 'currentColor',
  style = {}
}) {
  const ref = React.useRef(null);
  React.useEffect(() => {
    const host = ref.current;
    if (host && window.lucide) {
      host.innerHTML = '';
      const i = document.createElement('i');
      i.setAttribute('data-lucide', name);
      host.appendChild(i);
      window.lucide.createIcons({
        attrs: {
          width: size,
          height: size,
          'stroke-width': stroke
        },
        nameAttr: 'data-lucide'
      });
    }
  }, [name, size, stroke]);
  return /*#__PURE__*/React.createElement("span", {
    ref: ref,
    style: {
      display: 'inline-flex',
      alignItems: 'center',
      color,
      ...style
    }
  });
}
window.PfIcon = PfIcon;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/mebodo-portfolio/PfIcon.jsx", error: String((e && e.message) || e) }); }

// ui_kits/mebodo-portfolio/PortfolioBody.jsx
try { (() => {
// MEBODO RICHARD portfolio — skills, projects, testimonial, contact
function Skills() {
  const {
    ProgressBar,
    Card,
    Tag
  } = window.MRTECHMEBODORICHARDDesignSystem_88d510;
  const skills = [['Front-end · React / Next.js', 94], ['Back-end · Node / APIs', 88], ['Cloud / DevOps', 78], ['Mobile · React Native', 72]];
  const stack = ['React', 'TypeScript', 'Node.js', 'Next.js', 'PostgreSQL', 'AWS', 'Docker', 'GraphQL', 'Python', 'Tailwind'];
  return /*#__PURE__*/React.createElement("section", {
    style: {
      background: 'var(--background-subtle)',
      padding: '80px 24px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1080,
      margin: '0 auto',
      display: 'grid',
      gridTemplateColumns: '1fr 1fr',
      gap: 48
    },
    className: "pf-2col"
  }, /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("span", {
    className: "t-overline",
    style: {
      color: 'var(--color-teal-forest)'
    }
  }, "Comp\xE9tences"), /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-heading)',
      fontWeight: 700,
      fontSize: 32,
      letterSpacing: '-0.02em',
      color: 'var(--color-deep-navy)',
      margin: '12px 0 28px'
    }
  }, "Ce que je ma\xEEtrise."), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      flexDirection: 'column',
      gap: 18
    }
  }, skills.map(([l, v]) => /*#__PURE__*/React.createElement(ProgressBar, {
    key: l,
    label: l,
    value: v,
    showValue: true
  })))), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement(Card, {
    variant: "default",
    style: {
      height: '100%'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-mono)',
      fontSize: 12,
      letterSpacing: '0.1em',
      textTransform: 'uppercase',
      color: 'var(--text-muted)',
      marginBottom: 16
    }
  }, "Stack quotidien"), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      flexWrap: 'wrap',
      gap: 8
    }
  }, stack.map(t => /*#__PURE__*/React.createElement(Tag, {
    key: t,
    mono: true
  }, t))), /*#__PURE__*/React.createElement("div", {
    style: {
      marginTop: 28,
      paddingTop: 24,
      borderTop: '1px solid var(--border-default)',
      display: 'grid',
      gridTemplateColumns: '1fr 1fr',
      gap: 16
    }
  }, /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-heading)',
      fontWeight: 700,
      fontSize: 30,
      color: 'var(--color-teal-forest)'
    }
  }, "120+"), /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 13,
      color: 'var(--text-muted)'
    }
  }, "Projets livr\xE9s")), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-heading)',
      fontWeight: 700,
      fontSize: 30,
      color: 'var(--color-teal-forest)'
    }
  }, "40+"), /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 13,
      color: 'var(--text-muted)'
    }
  }, "Clients satisfaits")))))), /*#__PURE__*/React.createElement("style", null, `@media (max-width:760px){ .pf-2col{grid-template-columns:1fr !important;} }`));
}
window.Skills = Skills;
function Projects() {
  const {
    Card,
    Badge,
    Tag
  } = window.MRTECHMEBODORICHARDDesignSystem_88d510;
  const projects = [{
    title: 'Plateforme e-commerce',
    cat: 'Web App',
    desc: 'Marketplace multi-vendeurs avec paiement intégré et back-office complet.',
    tags: ['Next.js', 'Stripe', 'AWS'],
    color: 'var(--color-deep-navy)'
  }, {
    title: 'App de livraison',
    cat: 'Mobile',
    desc: 'Application mobile temps-réel avec suivi GPS et notifications.',
    tags: ['React Native', 'Node'],
    color: 'var(--color-teal-forest)'
  }, {
    title: 'Dashboard analytics',
    cat: 'SaaS',
    desc: 'Tableau de bord data avec visualisations et exports automatisés.',
    tags: ['React', 'D3', 'PostgreSQL'],
    color: 'var(--color-deep-navy)'
  }, {
    title: 'API bancaire sécurisée',
    cat: 'Backend',
    desc: 'API REST conforme, chiffrement bout-en-bout et audit complet.',
    tags: ['Node', 'Docker', 'OAuth'],
    color: 'var(--color-teal-forest)'
  }];
  return /*#__PURE__*/React.createElement("section", {
    style: {
      background: 'var(--background-default)',
      padding: '80px 24px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1080,
      margin: '0 auto'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      justifyContent: 'space-between',
      alignItems: 'flex-end',
      marginBottom: 36,
      flexWrap: 'wrap',
      gap: 12
    }
  }, /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("span", {
    className: "t-overline",
    style: {
      color: 'var(--color-teal-forest)'
    }
  }, "Projets r\xE9cents"), /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-heading)',
      fontWeight: 700,
      fontSize: 32,
      letterSpacing: '-0.02em',
      color: 'var(--color-deep-navy)',
      margin: '12px 0 0'
    }
  }, "S\xE9lection de r\xE9alisations."))), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: 'repeat(auto-fit,minmax(310px,1fr))',
      gap: 20
    }
  }, projects.map(p => /*#__PURE__*/React.createElement(Card, {
    key: p.title,
    variant: "default",
    interactive: true,
    padding: "none",
    style: {
      overflow: 'hidden'
    }
  }, /*#__PURE__*/React.createElement("div", {
    className: "mr-pattern-chevron--dark",
    style: {
      height: 150,
      background: p.color,
      position: 'relative',
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'center'
    }
  }, /*#__PURE__*/React.createElement(PfIcon, {
    name: "image",
    size: 40,
    color: "rgba(255,255,255,0.3)"
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'absolute',
      top: 14,
      left: 14
    }
  }, /*#__PURE__*/React.createElement(Badge, {
    tone: "accent",
    variant: "solid"
  }, p.cat))), /*#__PURE__*/React.createElement("div", {
    style: {
      padding: 24
    }
  }, /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-heading)',
      fontWeight: 600,
      fontSize: 20,
      color: 'var(--color-deep-navy)',
      margin: '0 0 8px'
    }
  }, p.title), /*#__PURE__*/React.createElement("p", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 14,
      lineHeight: 1.55,
      color: 'var(--text-muted)',
      margin: '0 0 14px'
    }
  }, p.desc), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      gap: 6,
      flexWrap: 'wrap'
    }
  }, p.tags.map(t => /*#__PURE__*/React.createElement(Tag, {
    key: t,
    mono: true
  }, t)))))))));
}
window.Projects = Projects;
function ContactCTA() {
  const {
    Button,
    Avatar
  } = window.MRTECHMEBODORICHARDDesignSystem_88d510;
  return /*#__PURE__*/React.createElement("section", {
    className: "mr-pattern-chevron--dark",
    style: {
      background: 'var(--color-deep-navy)',
      padding: '88px 24px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 760,
      margin: '0 auto',
      textAlign: 'center'
    }
  }, /*#__PURE__*/React.createElement(Avatar, {
    name: "Mebodo Richard",
    size: "xl",
    ring: true,
    style: {
      marginBottom: 24
    }
  }), /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-heading)',
      fontWeight: 700,
      fontSize: 'clamp(28px,4vw,40px)',
      letterSpacing: '-0.02em',
      color: '#fff',
      margin: '0 0 14px'
    }
  }, "Un projet en t\xEAte ? ", /*#__PURE__*/React.createElement("span", {
    style: {
      color: 'var(--color-lime)'
    }
  }, "Discutons-en.")), /*#__PURE__*/React.createElement("p", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 17,
      color: 'var(--text-on-dark)',
      margin: '0 0 28px'
    }
  }, "contact@mebodorichard.com \xB7 +241 74 22 83 06 \xB7 Libreville, Gabon"), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      gap: 12,
      justifyContent: 'center',
      flexWrap: 'wrap'
    }
  }, /*#__PURE__*/React.createElement(Button, {
    variant: "premium",
    size: "lg",
    iconLeft: /*#__PURE__*/React.createElement(PfIcon, {
      name: "mail",
      size: 18
    })
  }, "Me contacter"), /*#__PURE__*/React.createElement(Button, {
    variant: "tertiary",
    size: "lg",
    style: {
      color: '#fff',
      borderColor: 'rgba(255,255,255,0.25)'
    },
    iconLeft: /*#__PURE__*/React.createElement(PfIcon, {
      name: "linkedin",
      size: 17
    })
  }, "LinkedIn"))));
}
window.ContactCTA = ContactCTA;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/mebodo-portfolio/PortfolioBody.jsx", error: String((e && e.message) || e) }); }

// ui_kits/mebodo-portfolio/PortfolioHero.jsx
try { (() => {
// MEBODO RICHARD portfolio — personal hero
function PortfolioHero() {
  const {
    Button,
    Badge,
    Avatar
  } = window.MRTECHMEBODORICHARDDesignSystem_88d510;
  return /*#__PURE__*/React.createElement("section", {
    style: {
      background: 'var(--background-default)',
      position: 'relative'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1080,
      margin: '0 auto',
      padding: '24px',
      display: 'flex',
      justifyContent: 'space-between',
      alignItems: 'center'
    }
  }, /*#__PURE__*/React.createElement("img", {
    src: "../../assets/Logo-MEBODO.png",
    alt: "MEBODO RICHARD",
    style: {
      height: 34,
      width: 'auto',
      display: 'block'
    }
  }), /*#__PURE__*/React.createElement("nav", {
    style: {
      display: 'flex',
      gap: 26,
      alignItems: 'center'
    },
    className: "pf-nav"
  }, ['Compétences', 'Projets', 'Parcours', 'Contact'].map(l => /*#__PURE__*/React.createElement("a", {
    key: l,
    href: "#",
    style: {
      fontFamily: 'var(--font-body)',
      fontWeight: 600,
      fontSize: 15,
      color: 'var(--color-deep-navy)'
    }
  }, l)))), /*#__PURE__*/React.createElement("div", {
    className: "mr-pattern-chevron",
    style: {
      borderTop: '1px solid var(--border-default)',
      borderBottom: '1px solid var(--border-default)'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1080,
      margin: '0 auto',
      padding: '80px 24px',
      display: 'grid',
      gridTemplateColumns: '1.3fr 0.9fr',
      gap: 48,
      alignItems: 'center'
    },
    className: "pf-hero-grid"
  }, /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement(Badge, {
    tone: "success",
    dot: true,
    style: {
      marginBottom: 20
    }
  }, "Disponible pour de nouveaux projets"), /*#__PURE__*/React.createElement("h1", {
    style: {
      fontFamily: 'var(--font-heading)',
      fontWeight: 700,
      fontSize: 'clamp(36px,5vw,58px)',
      lineHeight: 1.05,
      letterSpacing: '-0.025em',
      color: 'var(--color-deep-navy)',
      margin: '0 0 18px'
    }
  }, "D\xE9veloppeur full-stack & architecte logiciel."), /*#__PURE__*/React.createElement("p", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 18,
      lineHeight: 1.6,
      color: 'var(--text-muted)',
      maxWidth: 520,
      margin: '0 0 28px'
    }
  }, "Je con\xE7ois et d\xE9veloppe des produits digitaux fiables, performants et \xE9l\xE9gants \u2014 du premier prototype jusqu'au d\xE9ploiement en production."), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      gap: 12,
      flexWrap: 'wrap'
    }
  }, /*#__PURE__*/React.createElement(Button, {
    variant: "primary",
    size: "lg",
    iconRight: /*#__PURE__*/React.createElement(PfIcon, {
      name: "arrow-right",
      size: 18
    })
  }, "Voir mes projets"), /*#__PURE__*/React.createElement(Button, {
    variant: "tertiary",
    size: "lg",
    iconLeft: /*#__PURE__*/React.createElement(PfIcon, {
      name: "download",
      size: 17
    })
  }, "T\xE9l\xE9charger le CV"))), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      justifyContent: 'center'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'relative'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      width: 240,
      height: 280,
      borderRadius: 'var(--radius-xl)',
      background: 'linear-gradient(160deg, var(--color-teal-forest), var(--color-deep-navy))',
      display: 'flex',
      alignItems: 'flex-end',
      justifyContent: 'center',
      overflow: 'hidden',
      boxShadow: 'var(--shadow-premium)'
    }
  }, /*#__PURE__*/React.createElement(PfIcon, {
    name: "user",
    size: 150,
    color: "rgba(255,255,255,0.25)"
  })), /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'absolute',
      bottom: -16,
      left: -16,
      background: 'var(--color-lime)',
      color: 'var(--color-deep-navy)',
      fontFamily: 'var(--font-mono)',
      fontWeight: 600,
      fontSize: 13,
      padding: '10px 14px',
      borderRadius: 'var(--radius-md)',
      boxShadow: 'var(--shadow-lime)'
    }
  }, "</> 7 ans d'XP"))))), /*#__PURE__*/React.createElement("style", null, `@media (max-width:760px){ .pf-hero-grid{grid-template-columns:1fr !important;} .pf-nav{display:none !important;} }`));
}
window.PortfolioHero = PortfolioHero;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/mebodo-portfolio/PortfolioHero.jsx", error: String((e && e.message) || e) }); }

// ui_kits/mrtech-site/Contact.jsx
try { (() => {
// MR TECH site — contact section (form) + final CTA + footer
function Contact({
  formRef
}) {
  const {
    Input,
    Textarea,
    Select,
    Button,
    Card,
    Alert
  } = window.MRTECHMEBODORICHARDDesignSystem_88d510;
  const [sent, setSent] = React.useState(false);
  return /*#__PURE__*/React.createElement("section", {
    ref: formRef,
    style: {
      background: 'var(--background-default)',
      padding: '88px 24px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1100,
      margin: '0 auto',
      display: 'grid',
      gridTemplateColumns: 'minmax(0,1fr) minmax(0,1.1fr)',
      gap: 56,
      alignItems: 'start'
    },
    className: "mr-contact-grid"
  }, /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("span", {
    className: "t-overline",
    style: {
      color: 'var(--color-teal-forest)'
    }
  }, "Contact"), /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-heading)',
      fontWeight: 700,
      fontSize: 'clamp(28px,4vw,40px)',
      letterSpacing: '-0.02em',
      color: 'var(--color-deep-navy)',
      margin: '12px 0 16px'
    }
  }, "Parlons de votre projet."), /*#__PURE__*/React.createElement("p", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 17,
      lineHeight: 1.6,
      color: 'var(--text-muted)',
      marginBottom: 28
    }
  }, "D\xE9crivez votre besoin \u2014 nous revenons vers vous sous 24h ouvr\xE9es avec une premi\xE8re proposition."), [['phone', '+241 74 22 83 06'], ['mail', 'contact@mebodorichard.com'], ['globe', 'www.mebodorichard.com'], ['map-pin', 'Libreville, Gabon']].map(([ic, val]) => /*#__PURE__*/React.createElement("div", {
    key: val,
    style: {
      display: 'flex',
      alignItems: 'center',
      gap: 12,
      marginBottom: 14
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      width: 38,
      height: 38,
      borderRadius: 'var(--radius-sm)',
      background: 'var(--teal-10)',
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'center'
    }
  }, /*#__PURE__*/React.createElement(MrIcon, {
    name: ic,
    size: 18,
    color: "var(--color-teal-forest)"
  })), /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 15,
      color: 'var(--color-deep-navy)',
      fontWeight: 500
    }
  }, val)))), /*#__PURE__*/React.createElement(Card, {
    variant: "elevated"
  }, sent && /*#__PURE__*/React.createElement("div", {
    style: {
      marginBottom: 16
    }
  }, /*#__PURE__*/React.createElement(Alert, {
    tone: "success",
    title: "Message envoy\xE9",
    onClose: () => setSent(false)
  }, "Merci ! Nous vous r\xE9pondrons tr\xE8s vite.")), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      flexDirection: 'column',
      gap: 16
    }
  }, /*#__PURE__*/React.createElement(Input, {
    label: "Nom complet",
    placeholder: "Jean Dupont"
  }), /*#__PURE__*/React.createElement(Input, {
    label: "Email",
    type: "email",
    placeholder: "vous@entreprise.com"
  }), /*#__PURE__*/React.createElement(Select, {
    label: "Service souhait\xE9",
    options: ['Développement Web', 'Application Mobile', 'Cloud & DevOps', 'Conseil & Architecture'],
    placeholder: "Choisir un service"
  }), /*#__PURE__*/React.createElement(Textarea, {
    label: "Votre projet",
    placeholder: "D\xE9crivez votre besoin\u2026",
    rows: 4
  }), /*#__PURE__*/React.createElement(Button, {
    variant: "primary",
    size: "lg",
    fullWidth: true,
    iconRight: /*#__PURE__*/React.createElement(MrIcon, {
      name: "send",
      size: 17
    }),
    onClick: () => setSent(true)
  }, "Envoyer la demande")))), /*#__PURE__*/React.createElement("style", null, `@media (max-width:760px){ .mr-contact-grid{grid-template-columns:1fr !important;} }`));
}
window.Contact = Contact;
function Footer() {
  const cols = [['Services', ['Développement Web', 'Mobile', 'Cloud & DevOps', 'Conseil']], ['Entreprise', ['À propos', 'Projets', 'Blog', 'Carrières']], ['Ressources', ['Documentation', 'Support', 'Mentions légales']]];
  return /*#__PURE__*/React.createElement("footer", {
    style: {
      background: 'var(--color-deep-navy)',
      padding: '64px 24px 32px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1200,
      margin: '0 auto'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: '1.4fr repeat(3, 1fr)',
      gap: 32
    },
    className: "mr-foot-grid"
  }, /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("img", {
    src: "../../assets/Logo-MR-TECH-white.png",
    alt: "MR TECH",
    style: {
      height: 30,
      marginBottom: 16
    }
  }), /*#__PURE__*/React.createElement("p", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 14,
      lineHeight: 1.6,
      color: 'var(--text-on-dark-muted)',
      maxWidth: 280
    }
  }, "Solutions technologiques sur mesure. Concevoir, d\xE9velopper, d\xE9ployer."), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      gap: 10,
      marginTop: 18
    }
  }, ['linkedin', 'github', 'twitter'].map(s => /*#__PURE__*/React.createElement("span", {
    key: s,
    style: {
      width: 36,
      height: 36,
      borderRadius: 'var(--radius-sm)',
      background: 'rgba(255,255,255,0.07)',
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'center',
      cursor: 'pointer'
    }
  }, /*#__PURE__*/React.createElement(MrIcon, {
    name: s,
    size: 17,
    color: "#fff"
  }))))), cols.map(([h, items]) => /*#__PURE__*/React.createElement("div", {
    key: h
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-mono)',
      fontSize: 12,
      letterSpacing: '0.1em',
      textTransform: 'uppercase',
      color: 'var(--color-electric-lime)',
      marginBottom: 16
    }
  }, h), items.map(it => /*#__PURE__*/React.createElement("a", {
    key: it,
    href: "#",
    style: {
      display: 'block',
      fontFamily: 'var(--font-body)',
      fontSize: 14,
      color: 'var(--text-on-dark-muted)',
      padding: '5px 0'
    }
  }, it))))), /*#__PURE__*/React.createElement("div", {
    style: {
      borderTop: '1px solid rgba(255,255,255,0.1)',
      marginTop: 40,
      paddingTop: 20,
      display: 'flex',
      justifyContent: 'space-between',
      flexWrap: 'wrap',
      gap: 8
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 13,
      color: 'var(--text-on-dark-muted)'
    }
  }, "\xA9 2026 MR TECH. Tous droits r\xE9serv\xE9s."), /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 13,
      color: 'var(--text-on-dark-muted)'
    }
  }, "Libreville, Gabon \xB7 +241 74 22 83 06"))), /*#__PURE__*/React.createElement("style", null, `@media (max-width:760px){ .mr-foot-grid{grid-template-columns:1fr 1fr !important;} }`));
}
window.Footer = Footer;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/mrtech-site/Contact.jsx", error: String((e && e.message) || e) }); }

// ui_kits/mrtech-site/Header.jsx
try { (() => {
// MR TECH site — sticky header with mobile menu
function Header({
  onNav
}) {
  const {
    Button
  } = window.MRTECHMEBODORICHARDDesignSystem_88d510;
  const [open, setOpen] = React.useState(false);
  const [scrolled, setScrolled] = React.useState(false);
  React.useEffect(() => {
    const root = document.querySelector('.mr-scroll') || window;
    const onScroll = () => setScrolled((root.scrollTop || window.scrollY) > 8);
    root.addEventListener('scroll', onScroll);
    return () => root.removeEventListener('scroll', onScroll);
  }, []);
  const links = ['Services', 'Technologies', 'Projets', 'À propos', 'Contact'];
  return /*#__PURE__*/React.createElement("header", {
    style: {
      position: 'sticky',
      top: 0,
      zIndex: 1100,
      background: scrolled ? 'rgba(255,255,255,0.85)' : 'transparent',
      backdropFilter: scrolled ? 'saturate(180%) blur(12px)' : 'none',
      borderBottom: scrolled ? '1px solid var(--border-default)' : '1px solid transparent',
      transition: 'all 200ms var(--ease-standard)'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1200,
      margin: '0 auto',
      padding: '0 24px',
      height: 72,
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'space-between'
    }
  }, /*#__PURE__*/React.createElement("img", {
    src: "../../assets/Logo-MR-TECH-1.png",
    alt: "MR TECH",
    style: {
      height: 32
    }
  }), /*#__PURE__*/React.createElement("nav", {
    style: {
      display: 'flex',
      gap: 28,
      alignItems: 'center'
    },
    className: "mr-desk-nav"
  }, links.map(l => /*#__PURE__*/React.createElement("a", {
    key: l,
    href: "#",
    onClick: e => {
      e.preventDefault();
      onNav && onNav(l);
    },
    style: {
      fontFamily: 'var(--font-body)',
      fontWeight: 600,
      fontSize: 15,
      color: 'var(--color-deep-navy)'
    }
  }, l))), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      gap: 10,
      alignItems: 'center'
    }
  }, /*#__PURE__*/React.createElement(Button, {
    variant: "primary",
    size: "sm",
    onClick: () => onNav && onNav('Contact')
  }, "D\xE9marrer un projet"), /*#__PURE__*/React.createElement("button", {
    className: "mr-burger",
    "aria-label": "Menu",
    onClick: () => setOpen(!open),
    style: {
      display: 'none',
      border: 'none',
      background: 'transparent',
      cursor: 'pointer'
    }
  }, /*#__PURE__*/React.createElement(MrIcon, {
    name: open ? 'x' : 'menu',
    size: 24,
    color: "var(--color-deep-navy)"
  })))), open && /*#__PURE__*/React.createElement("div", {
    style: {
      background: '#fff',
      borderTop: '1px solid var(--border-default)',
      padding: '12px 24px 20px'
    }
  }, links.map(l => /*#__PURE__*/React.createElement("a", {
    key: l,
    href: "#",
    onClick: e => {
      e.preventDefault();
      onNav && onNav(l);
      setOpen(false);
    },
    style: {
      display: 'block',
      padding: '12px 0',
      fontWeight: 600,
      color: 'var(--color-deep-navy)',
      borderBottom: '1px solid var(--border-subtle)'
    }
  }, l))), /*#__PURE__*/React.createElement("style", null, `
        @media (max-width: 860px){ .mr-desk-nav{display:none !important;} .mr-burger{display:inline-flex !important;} }
      `));
}
window.Header = Header;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/mrtech-site/Header.jsx", error: String((e && e.message) || e) }); }

// ui_kits/mrtech-site/Hero.jsx
try { (() => {
// MR TECH site — hero (Deep Navy, chevron pattern, lime accents)
function Hero({
  onNav
}) {
  const {
    Button,
    Badge,
    StatCard
  } = window.MRTECHMEBODORICHARDDesignSystem_88d510;
  return /*#__PURE__*/React.createElement("section", {
    className: "mr-pattern-chevron--dark",
    style: {
      background: 'var(--color-deep-navy)',
      position: 'relative',
      overflow: 'hidden'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'absolute',
      inset: 0,
      background: 'radial-gradient(120% 80% at 80% 0%, rgba(159,193,49,0.14), transparent 60%)'
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'relative',
      maxWidth: 1200,
      margin: '0 auto',
      padding: '96px 24px 80px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 820
    }
  }, /*#__PURE__*/React.createElement(Badge, {
    tone: "accent",
    variant: "solid",
    style: {
      marginBottom: 22
    }
  }, "\u25CF Entreprise technologique \xB7 Libreville"), /*#__PURE__*/React.createElement("h1", {
    style: {
      fontFamily: 'var(--font-heading)',
      fontWeight: 700,
      fontSize: 'clamp(40px, 6vw, 64px)',
      lineHeight: 1.04,
      letterSpacing: '-0.025em',
      color: '#fff',
      margin: '0 0 22px'
    }
  }, "Solutions tech sur mesure pour entreprises ", /*#__PURE__*/React.createElement("span", {
    style: {
      color: 'var(--color-lime)'
    }
  }, "ambitieuses"), "."), /*#__PURE__*/React.createElement("p", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 19,
      lineHeight: 1.6,
      color: 'var(--text-on-dark)',
      maxWidth: 620,
      margin: '0 0 34px'
    }
  }, "MR TECH con\xE7oit, d\xE9veloppe et d\xE9ploie des produits digitaux fiables et \xE9volutifs \u2014 du web \xE0 l'application, de l'architecture au cloud."), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      gap: 14,
      flexWrap: 'wrap'
    }
  }, /*#__PURE__*/React.createElement(Button, {
    variant: "premium",
    size: "lg",
    iconRight: /*#__PURE__*/React.createElement(MrIcon, {
      name: "arrow-right",
      size: 18
    }),
    onClick: () => onNav && onNav('Contact')
  }, "D\xE9marrer un projet"), /*#__PURE__*/React.createElement(Button, {
    variant: "tertiary",
    size: "lg",
    style: {
      color: '#fff',
      borderColor: 'rgba(255,255,255,0.25)'
    },
    onClick: () => onNav && onNav('Projets')
  }, "Voir nos projets"))), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: 'repeat(auto-fit,minmax(170px,1fr))',
      gap: 16,
      marginTop: 64
    }
  }, /*#__PURE__*/React.createElement(StatCard, {
    variant: "dark",
    value: "120+",
    label: "Projets livr\xE9s",
    delta: "+18% / an"
  }), /*#__PURE__*/React.createElement(StatCard, {
    variant: "dark",
    value: "98%",
    label: "Satisfaction client"
  }), /*#__PURE__*/React.createElement(StatCard, {
    variant: "dark",
    value: "7 ans",
    label: "D'expertise"
  }), /*#__PURE__*/React.createElement(StatCard, {
    variant: "dark",
    value: "24h",
    label: "Temps de r\xE9ponse"
  }))));
}
window.Hero = Hero;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/mrtech-site/Hero.jsx", error: String((e && e.message) || e) }); }

// ui_kits/mrtech-site/MrIcon.jsx
try { (() => {
// Lucide icon helper (CDN UMD must be loaded before this runs).
// Renders a Lucide line icon that inherits currentColor.
function MrIcon({
  name,
  size = 20,
  stroke = 2,
  color = 'currentColor',
  style = {}
}) {
  const ref = React.useRef(null);
  React.useEffect(() => {
    const host = ref.current;
    if (host && window.lucide) {
      host.innerHTML = '';
      const i = document.createElement('i');
      i.setAttribute('data-lucide', name);
      host.appendChild(i);
      window.lucide.createIcons({
        attrs: {
          width: size,
          height: size,
          'stroke-width': stroke
        },
        nameAttr: 'data-lucide'
      });
    }
  }, [name, size, stroke]);
  return /*#__PURE__*/React.createElement("span", {
    ref: ref,
    style: {
      display: 'inline-flex',
      alignItems: 'center',
      color,
      ...style
    }
  });
}
window.MrIcon = MrIcon;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/mrtech-site/MrIcon.jsx", error: String((e && e.message) || e) }); }

// ui_kits/mrtech-site/Process.jsx
try { (() => {
// MR TECH site — process (Teal Forest section) + tech stack
function Process() {
  const steps = [{
    n: '01',
    icon: 'search',
    title: 'Cadrage',
    desc: 'Analyse des besoins, objectifs et contraintes techniques.'
  }, {
    n: '02',
    icon: 'pen-tool',
    title: 'Conception',
    desc: 'Architecture, design UX/UI et prototypage validé avec vous.'
  }, {
    n: '03',
    icon: 'code-2',
    title: 'Développement',
    desc: 'Build itératif, tests continus et démos régulières.'
  }, {
    n: '04',
    icon: 'rocket',
    title: 'Déploiement',
    desc: 'Mise en production, monitoring et accompagnement durable.'
  }];
  return /*#__PURE__*/React.createElement("section", {
    className: "mr-pattern-chevron--dark",
    style: {
      background: 'var(--color-teal-forest)',
      padding: '88px 24px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1200,
      margin: '0 auto'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      marginBottom: 44,
      maxWidth: 640
    }
  }, /*#__PURE__*/React.createElement("span", {
    className: "t-overline",
    style: {
      color: 'var(--color-electric-lime)'
    }
  }, "Notre m\xE9thode"), /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-heading)',
      fontWeight: 700,
      fontSize: 'clamp(30px,4vw,42px)',
      letterSpacing: '-0.02em',
      color: '#fff',
      margin: '12px 0 0'
    }
  }, "Un process clair. Concevoir. D\xE9velopper. D\xE9ployer.")), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: 'repeat(auto-fit,minmax(230px,1fr))',
      gap: 20
    }
  }, steps.map(s => /*#__PURE__*/React.createElement("div", {
    key: s.n,
    style: {
      background: 'rgba(255,255,255,0.06)',
      border: '1px solid rgba(255,255,255,0.12)',
      borderRadius: 'var(--radius-lg)',
      padding: 24
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      justifyContent: 'space-between',
      alignItems: 'center',
      marginBottom: 18
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-mono)',
      fontSize: 13,
      color: 'var(--color-electric-lime)'
    }
  }, s.n), /*#__PURE__*/React.createElement(MrIcon, {
    name: s.icon,
    size: 22,
    color: "#fff"
  })), /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-heading)',
      fontWeight: 600,
      fontSize: 19,
      color: '#fff',
      margin: '0 0 6px'
    }
  }, s.title), /*#__PURE__*/React.createElement("p", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 14,
      lineHeight: 1.55,
      color: '#CFE3DF',
      margin: 0
    }
  }, s.desc))))));
}
window.Process = Process;

// Tech stack strip
function TechStack() {
  const techs = ['React', 'TypeScript', 'Node.js', 'Next.js', 'PostgreSQL', 'AWS', 'Docker', 'Python', 'Flutter', 'GraphQL', 'Redis', 'Kubernetes'];
  return /*#__PURE__*/React.createElement("section", {
    style: {
      background: 'var(--background-subtle)',
      padding: '64px 24px',
      borderTop: '1px solid var(--border-default)',
      borderBottom: '1px solid var(--border-default)'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1200,
      margin: '0 auto',
      textAlign: 'center'
    }
  }, /*#__PURE__*/React.createElement("span", {
    className: "t-overline",
    style: {
      color: 'var(--color-teal-forest)'
    }
  }, "Stack technologique"), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      flexWrap: 'wrap',
      gap: 12,
      justifyContent: 'center',
      marginTop: 24
    }
  }, techs.map(t => /*#__PURE__*/React.createElement("span", {
    key: t,
    style: {
      fontFamily: 'var(--font-mono)',
      fontSize: 15,
      fontWeight: 500,
      color: 'var(--color-deep-navy)',
      background: '#fff',
      border: '1.5px solid var(--border-default)',
      borderRadius: 'var(--radius-sm)',
      padding: '8px 16px'
    }
  }, t)))));
}
window.TechStack = TechStack;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/mrtech-site/Process.jsx", error: String((e && e.message) || e) }); }

// ui_kits/mrtech-site/Services.jsx
try { (() => {
// MR TECH site — services grid
function Services() {
  const {
    Card,
    Tag
  } = window.MRTECHMEBODORICHARDDesignSystem_88d510;
  const items = [{
    icon: 'code-2',
    title: 'Développement Web',
    desc: 'Sites vitrines, plateformes et applications web performantes et sur mesure.',
    tags: ['React', 'Next.js', 'Node']
  }, {
    icon: 'smartphone',
    title: 'Applications Mobiles',
    desc: 'Apps natives et cross-platform, du prototype au store, pensées UX-first.',
    tags: ['React Native', 'Flutter']
  }, {
    icon: 'cloud',
    title: 'Cloud & DevOps',
    desc: 'Infrastructure scalable, CI/CD, conteneurs et monitoring en continu.',
    tags: ['AWS', 'Docker', 'CI/CD']
  }, {
    icon: 'shield-check',
    title: 'Cybersécurité',
    desc: 'Audits, durcissement et conformité pour protéger vos données et vos accès.',
    tags: ['Audit', 'OWASP']
  }, {
    icon: 'brain-circuit',
    title: 'IA & Automatisation',
    desc: 'Intégration de modèles, agents et automatisations métier sur mesure.',
    tags: ['LLM', 'API']
  }, {
    icon: 'layout-dashboard',
    title: 'Conseil & Architecture',
    desc: "Cadrage technique, architecture logicielle et accompagnement d'équipes.",
    tags: ['Audit', 'Stratégie']
  }];
  return /*#__PURE__*/React.createElement("section", {
    style: {
      background: 'var(--background-default)',
      padding: '88px 24px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1200,
      margin: '0 auto'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      marginBottom: 44,
      maxWidth: 640
    }
  }, /*#__PURE__*/React.createElement("span", {
    className: "t-overline",
    style: {
      color: 'var(--color-teal-forest)'
    }
  }, "Nos services"), /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-heading)',
      fontWeight: 700,
      fontSize: 'clamp(30px,4vw,42px)',
      letterSpacing: '-0.02em',
      color: 'var(--color-deep-navy)',
      margin: '12px 0 0'
    }
  }, "Une expertise compl\xE8te, de l'id\xE9e au d\xE9ploiement.")), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: 'repeat(auto-fit,minmax(310px,1fr))',
      gap: 20
    }
  }, items.map(it => /*#__PURE__*/React.createElement(Card, {
    key: it.title,
    variant: "default",
    interactive: true,
    accentTop: true
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      width: 48,
      height: 48,
      borderRadius: 'var(--radius-md)',
      background: 'var(--teal-10)',
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'center',
      marginBottom: 18
    }
  }, /*#__PURE__*/React.createElement(MrIcon, {
    name: it.icon,
    size: 24,
    color: "var(--color-teal-forest)"
  })), /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-heading)',
      fontWeight: 600,
      fontSize: 21,
      color: 'var(--color-deep-navy)',
      margin: '0 0 8px'
    }
  }, it.title), /*#__PURE__*/React.createElement("p", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 15,
      lineHeight: 1.6,
      color: 'var(--text-muted)',
      margin: '0 0 16px'
    }
  }, it.desc), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      gap: 6,
      flexWrap: 'wrap'
    }
  }, it.tags.map(t => /*#__PURE__*/React.createElement(Tag, {
    key: t,
    mono: true
  }, t))))))));
}
window.Services = Services;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/mrtech-site/Services.jsx", error: String((e && e.message) || e) }); }

__ds_ns.Avatar = __ds_scope.Avatar;

__ds_ns.Badge = __ds_scope.Badge;

__ds_ns.Button = __ds_scope.Button;

__ds_ns.IconButton = __ds_scope.IconButton;

__ds_ns.Logo = __ds_scope.Logo;

__ds_ns.Tag = __ds_scope.Tag;

__ds_ns.ProgressBar = __ds_scope.ProgressBar;

__ds_ns.StatCard = __ds_scope.StatCard;

__ds_ns.Alert = __ds_scope.Alert;

__ds_ns.Checkbox = __ds_scope.Checkbox;

__ds_ns.Input = __ds_scope.Input;

__ds_ns.Radio = __ds_scope.Radio;

__ds_ns.Select = __ds_scope.Select;

__ds_ns.Switch = __ds_scope.Switch;

__ds_ns.Textarea = __ds_scope.Textarea;

__ds_ns.Card = __ds_scope.Card;

__ds_ns.Tabs = __ds_scope.Tabs;

})();
