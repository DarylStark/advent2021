// Includes
#include <diot_wifi.h>
#include <Adafruit_NeoPixel.h>

// Static configuration
#define DIOT_APP_NAME "RGB LED Strip"
#define DIOT_APP_VERSION_MAJOR 0
#define DIOT_APP_VERSION_MINOR 0
#define DIOT_APP_VERSION_REVISION 1
#define DIOT_APP_BRANCH "Development"

#define LED_COLOR_HISTORY 128

#ifndef SERIAL_LOGLEVEL
#define SERIAL_LOGLEVEL DEBUG
#endif

namespace diot
{
    struct Color
    {
        uint8_t red;
        uint8_t green;
        uint8_t blue;
    };

    class WS2812B
    {
    private:
        uint16_t __gpio;
        uint16_t __length;
        Adafruit_NeoPixel __strip;
        Color __led_color[LED_COLOR_HISTORY];

    public:
        WS2812B() {}
        WS2812B(uint16_t gpio, uint16_t length)
        {
            set_gpio(gpio);
            set_length(length);
            __strip.begin();
            __strip.clear();
        }

        void set_gpio(uint16_t gpio)
        {
            __gpio = gpio;
            __strip.setPin(__gpio);
        }

        void set_length(uint16_t length)
        {
            __length = length;
            __strip.updateLength(__length);
        }

        void update_strip()
        {
            __strip.show();
        }

        void set_color(Color color, bool show = true)
        {
            set_color(color, 0, __length, show);
        }

        void set_color(Color color, uint16_t start, uint16_t count, bool show = true)
        {
            if (start < __length)
            {
                uint16_t end = start + count;
                if (end > __length)
                {
                    end = __length - 1;
                }

                for (uint16_t i = start; i < end; i++)
                {
                    __strip.setPixelColor(i, __strip.Color(color.red, color.green, color.blue));
                }
            }

            if (show)
            {
                update_strip();
            }
        }

        void turn_off(bool show = true)
        {
            turn_off(0, __length, show);
        }

        void turn_off(uint16_t start, uint16_t count, bool show = true)
        {
            set_color({0, 0, 0}, start, count, show);
        }
    };
}
